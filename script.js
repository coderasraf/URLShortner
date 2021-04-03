// Selecting all required elements

const form = document.querySelector('.wrapper form');
const fullURL = document.querySelector('#fullURL');
const shortenBtn = document.querySelector('#shortenBTN');
const blurEffect = document.querySelector('.blur-effect');
const popupBox = document.querySelector('.popup-box');
const shortenURL = document.querySelector('#shortenURL');

    form.onsubmit = (e)=>{
        e.preventDefault();
    }

     shortenBtn.onclick = ()=>{
        const xhr = new XMLHttpRequest();
        xhr.open('POST', 'php/url-controll.php',  true);
        xhr.onload =()=>{
            if(xhr.readyState == 4 && xhr.status ==200){
                let data = xhr.response;
                if(data.length <= 5){
                    blurEffect.style.display = 'block';
                    popupBox.classList.add('show');
                    let domain = "localhost/url?u=";
                    shortenURL.value = domain + data;
                    console.log(data);
                }else{
                    alert(data);
                }
            }
        };
        let formData = new FormData(form); //creating new from data object
        xhr.send(formData); //Sending data to php file
     }


     blurEffect.onclick = (e)=>{
         popupBox.classList.remove('show');
         e.target.style.display = "none";
     }
