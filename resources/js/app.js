URL = 'http://127.0.0.1:8000'
const Fetch = async (payload, url, method = "POST") => {
    const csrfToken = document.head.querySelector("meta[name='csrf-token']").content
    try {
        const res = await fetch(URL+url,{
            method: method,
            headers: {
                'Content-type':'application/json',
                'X-CSRF-Token':csrfToken,
            },
            body: JSON.stringify(payload)
        })
        const data = await res.json()
        return data
    } catch (error) {
        alert('Something went wrong!')
    }
}
toggle_check = function (ele,id) {
    const tableRow = ele.parentNode.parentNode.parentNode
    if(ele.checked){
        Fetch({id,status:true},'/api/check')
        tableRow.style.textDecoration = 'line-through'
    } else {
        Fetch({id,status:false},'/api/check')
        tableRow.style.textDecoration = 'none'
    }
}
activeInputField = function (id,coulmn,ele) {
    if(ele.children.length <= 0){
        let value = ele.innerHTML
        ele.innerHTML = `<input onblur="submitData(${id},'${coulmn}',this)" type="text" value="${value}">`;
    }
}
submitData = function (id,coulmn,ele){
    let value = ele.value
    let parent = ele.parentNode
    let payload = {
        id,
        coulmn,
        value: value
    }
    ele.remove()
    parent.innerHTML = value;
    Fetch(payload,'/api/appointment/update')
}
knowAppointmentAvailable = async function (date, doctorId){
    return await Fetch({date,doctorId},'/api/doctor/check/available')
}
handleAppointmentAvailable = function(){
    const available_indicator = document.getElementById('available-indicator')
    const unavailable_indicator = document.getElementById('not-available-indicator')
    const appointment_create_submit_btn = document.getElementById('appointment-create-submit-btn')
    unavailable_indicator.style.display = 'none';
    available_indicator.style.display = 'block';
    if(appointment_create_submit_btn.classList.contains('btn-scendary')){
        appointment_create_submit_btn.classList.add('btn-primary')
        appointment_create_submit_btn.classList.remove('btn-scendary')
        appointment_create_submit_btn.removeAttribute("disabled");
        appointment_create_submit_btn.style.border = "none";
    }
}
handleAppointmentUnavailable = function(){
    const available_indicator = document.getElementById('available-indicator')
    const unavailable_indicator = document.getElementById('not-available-indicator')
    const appointment_create_submit_btn = document.getElementById('appointment-create-submit-btn')
    unavailable_indicator.style.display = 'block';
    available_indicator.style.display = 'none';
    if(appointment_create_submit_btn.classList.contains('btn-primary')){
        appointment_create_submit_btn.classList.remove('btn-primary')
        appointment_create_submit_btn.classList.add('btn-scendary')
        appointment_create_submit_btn.setAttribute("disabled", "");
        appointment_create_submit_btn.style.border = "1px solid gray";
    }
}
dateChangeDetector = function (ele){
    const selectedDoctor = ele.parentNode.parentNode.querySelector('#appointment-doctor')
    if(selectedDoctor.value !== "not-selected"){
        let res = knowAppointmentAvailable(ele.value,selectedDoctor.value)
        res.then((data)=>{
            if(data.available == "false"){
                handleAppointmentUnavailable()
            }else{
                handleAppointmentAvailable()
            }
        })
    }
}
departmentChangeDetector = function (ele){
    const doctor = ele.parentNode.querySelector('#appointment-doctor')
    let html = `<option value="not-selected">Select A Doctor</option>`;
    if(ele.value === 'not-selected'){
        let option = ''
        for (let key in doctors) {
            option = `<option value="${key}">${doctors[key].name}</option>`;
            html+=option
        }
        console.log('Not Selected')
        console.log(html)
    }else{
        let selected_department_id = ele.value
        let option = ''
        for (let key in doctors) {
            if(doctors[key].department_id === selected_department_id){
                option = `<option value="${key}">${doctors[key].name}</option>`;
                html+=option
            }
        }
        console.log('Selected')
        console.log(html)
    }
    doctor.innerHTML = html
}
doctorChangeDetector = function (ele){
    const selectedDate = ele.parentNode.parentNode.querySelector('#appointment-date')
    if(ele.value !== "not-selected"){
        const doctors_fee = ele.parentNode.querySelector('#doctorsFee')
        doctors_fee.value = `${doctors[ele.value].fee} TK`
        if(selectedDate.value !== ""){
            let res = knowAppointmentAvailable(selectedDate.value,ele.value)
            res.then((data)=>{
                if(data.available == "false"){
                    handleAppointmentUnavailable()
                }else{
                    handleAppointmentAvailable()
                }
            })
        }
    }
}