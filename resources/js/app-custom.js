document.addEventListener('DOMContentLoaded', ()=>{

    if (document.querySelector('.dropdown')) {
        document.querySelector('.dropdown').addEventListener('click', ()=>{
            document.querySelector('.dropdown-content').classList.toggle('dropdown-open');
        });

        document.querySelector('.login-selector').addEventListener('click', ()=>{
            document.querySelector('.registration-item').classList.remove('dropdown-open');
            document.querySelector('.login-selector').classList.add('active');
            document.querySelector('.registration-selector').classList.remove('active');
            document.querySelector('.login-item').classList.add('dropdown-open');
        });

        document.querySelector('.registration-selector').addEventListener('click', ()=>{
            document.querySelector('.login-item').classList.remove('dropdown-open');
            document.querySelector('.registration-selector').classList.add('active');
            document.querySelector('.login-selector').classList.remove('active');
            document.querySelector('.registration-item').classList.add('dropdown-open');
        });

        document.body.addEventListener('click', (e)=>{
            if(e.target.classList.contains('dropdown-open')||e.target.classList.contains('close')){
                document.querySelector('.dropdown-content').classList.remove('dropdown-open');
            }
            // document.querySelector('.registration-item').classList.add('dropdown-open');
        });
    }

    if (document.querySelector('.menu-user')) {
        document.querySelector('.menu-user').addEventListener('click', ()=>{
            document.querySelector('.menu-user-content').classList.toggle('visible');
        });

        document.body.addEventListener('click', (e)=>{
            if(e.target.classList.contains('visible')||!e.target.classList.contains('menu-user')){
                document.querySelector('.menu-user-content').classList.remove('visible');
            }
        });
    }


});

if (document.querySelector('.file-input')) {
    let labelVal=document.querySelector('.file-name').innerHTML;
    document.querySelector('.file-input').addEventListener('change', function(e){
        let fileName = '';
        if (this.files && this.files.length > 1) {
            fileName+='<ol>';
            for (const key of this.files) {
                fileName+=`<li>${key.name}</li>`;
            };
            fileName+='</ol>';
        }else{
            fileName = this.value.split( '\\' ).pop();

        };

        if (fileName) {
            document.querySelector('.file-name').innerHTML=fileName;
        } else {
            document.querySelector('.file-name').innerHTML = labelVal;
        }

    });
}


// var phone = document.querySelector(".user-phone");


let phones = document.querySelectorAll('input[name="phone"]');
    for(let ph of phones){
        Inputmask( {"mask": "+38 (999) 99-99-999", "placeholder": "_", "removeMaskOnSubmit": true}).mask(ph);
    }

const axios = require('axios').default;

document.addEventListener('DOMContentLoaded', ()=>{

if(document.forms.cake){
    document.forms.cake.addEventListener('submit', function (e) {
    e.preventDefault();
    const fd = new FormData(this);
    // console.log('object :', fd);
    axios({
        method: 'post',
        url: '/cake',
        data: fd
        })
        .then(response=>{
            // console.log('object :', response);
        // return response.json();
        showCart(response.data);
        })
        .catch(function (error) {
        console.log(error);
        });
});
}

if(document.querySelector('.add-to-cart')){
    document.querySelector('.add-to-cart').addEventListener('submit', function (e) {
    e.preventDefault();
    const fd = new FormData(this);
console.log('object :', e.target);
    axios({
        method: 'post',
        url: '/cart/add',
        data: fd
        })
        .then(response=>{
        // return response.json();
        // showCart(response.data);
        })
        .catch(function (error) {
        console.log(error);
        });
});
}

if (document.querySelector('.clear-cart')) {
    document.querySelector('.clear-cart').addEventListener('click', function (e) {
        e.preventDefault();
        console.log('object :', e);
        // const fd = new FormData(this);

        axios({
            method: 'POST',
            url: '/cart/clear',
            // data: fd
        })
        .then(response=>{
            // return response.json();
            showCart(response.data);
        })
        .catch(function (error) {
            console.log(error);
        });
    });
}

    function showCart(data) {
        document.querySelector('.cart-modal').innerHTML = data;
    }

    document.querySelector('.cart-modal').addEventListener('click', function (e) {
        e.preventDefault();
        if (e.target.classList.contains('remove')) {
          const id = e.target.getAttribute('data-id');

        axios({
            method: 'post',
            url: '/cart/remove',
            data: {product_id: id}
          })
          .then(response=>{
            showCart(response.data);
          })
          .catch(function (error) {
            console.log(error);
          });
        }

    });

    document.querySelector('.cart-modal').addEventListener('input', function (e) {
        e.preventDefault();
        console.log('object :', e.target);
        if (e.target.classList.contains('product_qty')) {
          const id = e.target.getAttribute('data-id');
          const qty = e.target.value;

        axios({
            method: 'post',
            url: '/cart/change',
            data: {product_id: id, product_qty: qty}
          })
          .then(response=>{
            showCart(response.data);
          })
          .catch(function (error) {
            console.log(error);
          });
        }

    });

});
