// Selecting all required elements

const form = document.querySelector('.wrapper form');
const fullURL = document.querySelector('#fullURL');
const shortenBtn = document.querySelector('#shortenBTN');

    form.onsubmit = (e)=>{
        e.preventDefault();
    }

     shortenBtn.onclick = ()=>{
        const xhr = new XMLHttpRequest();
        xhr.open('POST', 'php/url-controll.php',  true);
        xhr.onload =()=>{
            if(xhr.readyState == 4 && xhr.status ==200){
                let data = xhr.response;
                console.log(data);
            }
        };
        let formData = new FormData(form); //creating new from data object
        xhr.send(formData); //Sending data to php file
     }