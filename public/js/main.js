const select = document.getElementById('select')

const inputos_wrap = document.querySelector('.inputos-wrap')
const inputprocessor_wrap = document.querySelector('.inputprocessor-wrap')
const inputram_wrap = document.querySelector('.inputram-wrap')
const inputstorage_wrap = document.querySelector('.inputstorage-wrap')
const inputsn_wrap = document.querySelector('.inputsn-wrap')
const inputantivirus_wrap = document.querySelector('.inputantivirus-wrap')
const inputport_wrap = document.querySelector('.inputport-wrap')
const inputlicense_wrap = document.querySelector('.inputlicense-wrap')
const inputfile_wrap = document.querySelector('.inputfile-wrap')
const inputexpired_wrap = document.querySelector('.inputexpired-wrap')
const inputemployee_wrap = document.querySelector('.inputemployee-wrap')

window.onload = function() {
    let selectedValue = select.value;
    if (selectedValue) {
        select.dispatchEvent(new Event('change'));
    }
}

select.addEventListener('change', (e) => {
    console.log(e.target.value)
    let selectedValue = e.target.value
    
    // First, hide all the fields by default
    inputos_wrap.classList.add('hidden');
    inputprocessor_wrap.classList.add('hidden');
    inputram_wrap.classList.add('hidden');
    inputstorage_wrap.classList.add('hidden');
    inputsn_wrap.classList.add('hidden');
    inputantivirus_wrap.classList.add('hidden');
    inputlicense_wrap.classList.add('hidden');
    inputport_wrap.classList.add('hidden');
    inputfile_wrap.classList.add('hidden');
    inputexpired_wrap.classList.add('hidden');
    inputemployee_wrap.classList.remove('hidden');
    
    // Show fields based on the selected option
    if (selectedValue === "laptop" || selectedValue === "pc") {
        inputos_wrap.classList.remove('hidden');
        inputprocessor_wrap.classList.remove('hidden');
        inputram_wrap.classList.remove('hidden');
        inputstorage_wrap.classList.remove('hidden');
        inputsn_wrap.classList.remove('hidden');
        inputantivirus_wrap.classList.remove('hidden');
        inputemployee_wrap.classList.remove('hidden');
    }


    if (selectedValue === "switch" ||selectedValue === "router" ||selectedValue === "ap" ) {
        inputport_wrap.classList.remove('hidden');
        inputsn_wrap.classList.remove('hidden');
        inputemployee_wrap.classList.remove('hidden');
       
    }

    if (selectedValue === "server" ) {
        inputos_wrap.classList.remove('hidden');
        inputprocessor_wrap.classList.remove('hidden');
        inputram_wrap.classList.remove('hidden');
        inputstorage_wrap.classList.remove('hidden');
        inputsn_wrap.classList.remove('hidden');
        inputantivirus_wrap.classList.remove('hidden');
        inputemployee_wrap.classList.remove('hidden');
    }

    if (selectedValue === "license" ) {
        inputlicense_wrap.classList.remove('hidden');
        inputfile_wrap.classList.remove('hidden');
        inputsn_wrap.classList.remove('hidden');
        inputemployee_wrap.classList.remove('hidden');
        inputexpired_wrap.classList.remove('hidden');
    }

});      

// Get the element that triggers the tooltip
let tooltipTriggerEl = document.getElementById('expired');

// Initialize the tooltip using Bootstrap's Tooltip API
let tooltip = new bootstrap.Tooltip(tooltipTriggerEl, {
    // You can pass options here
    placement: 'top',  // Example option
    trigger: 'hover'   // Default trigger is hover, but you can customize
});