document.addEventListener('DOMContentLoaded', ()=>{

    if (document.querySelector('.log-in')) {
        document.querySelector('.log-in').addEventListener('click', ()=>{
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
            console.log('object :', e.target);
            // if(e.target.classList.contains('menu-open')||e.target.classList.contains('fa')){
                
            //     document.querySelector('.nav-menu').classList.remove('menu-open');
            //     document.querySelector('.open-right')?document.querySelector('nav').classList.remove('open-right'):'';
            //     document.querySelector('.open-left')?document.querySelector('nav').classList.remove('open-left'):'';
            // }

            // if(e.target.classList.contains('user-open')||e.target.classList.contains('fa')){
                
            //     document.querySelector('.nav-menu').classList.remove('menu-open');
            //     document.querySelector('.open-right')?document.querySelector('nav').classList.remove('open-right'):'';
            //     // document.querySelector('.open-left')?document.querySelector('nav').classList.remove('open-left'):'';
            // }
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

    document.querySelector('.fa-bars').addEventListener('click', ()=>{
        document.querySelector('.nav-menu').classList.toggle('menu-open');
        document.querySelector('nav').classList.toggle('open-right');
        
        if (document.querySelector('.menu-open')) {
            document.querySelector('main').classList.add('main-open');
        } else {
            document.querySelector('main').classList.remove('main-open');
        }

        document.querySelector('.nav-users').classList.remove('user-open');
        document.querySelector('nav').classList.remove('open-left');
    })

    document.querySelector('.fa-user').addEventListener('click', ()=>{
        document.querySelector('.nav-users').classList.toggle('user-open');
        document.querySelector('nav').classList.toggle('open-left');

        if (document.querySelector('.user-open')) {
            document.querySelector('main').classList.add('main-open');
        } else {
            document.querySelector('main').classList.remove('main-open');
        }

        document.querySelector('.nav-menu').classList.remove('menu-open');
        document.querySelector('nav').classList.remove('open-right');
    })



    
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
// let emails = document.querySelectorAll('input[name="email"]');
// let emailsss = document.querySelector('input[type="email"]');
// Inputmask( {alias: "email"}).mask(emailsss);

// let name = document.querySelector('input[name="name"]');
// Inputmask( {"mask": "Имя: a{1,20}  a{1,20}", "placeholder": "_", "removeMaskOnSubmit": true}).mask(name);
    // for(let email of emails){
    //     Inputmask( {
    //         mask: "aaaa",
    //         // mask: "*{1,20}[.*{1,20}][.*{1,20}][.*{1,20}]@*{1,20}[.*{2,6}][.*{1,2}]",
    //         // "placeholder": "_",
    //         // greedy: false,
    //         // onBeforePaste: function (pastedValue, opts) {
    //         // pastedValue = pastedValue.toLowerCase();
    //         // return pastedValue.replace("mailto:", "");
    //         // },
    //         // definitions: {
    //         // '*': {
    //         //     validator: "[0-9A-Za-z!#$%&'*+/=?^_`{|}~\-]",
    //         //     casing: "lower"
    //         //     },
    //         // },
    //         "removeMaskOnSubmit": true}).mask(email);
    // };
    import Inputmask from "inputmask";

let phones = document.querySelectorAll('input[name="phone"]');
    for(let ph of phones){
        Inputmask( {"mask": "+38 (999) 99-99-999", "placeholder": "_", "removeMaskOnSubmit": true}).mask(ph);
    }



let delivery = document.querySelectorAll('input[name="street"]');
Inputmask( {"mask": "St.: a{5,15} / build: 9{1,4} / room: 9{1,4}", "placeholder": "_"}).mask(delivery);


const axios = require('axios').default;



document.addEventListener('DOMContentLoaded', ()=>{

// axios.get('/api/get-count')
//     .then(function (response) {
//         console.log('object :', response.data);
//         // if (response.status === 200) {
//         //     alert('ok')
//         //     cartIcon(response.data)

//         // }
//         // console.log(response);
//     })
//     .catch(function (error) {
//         // handle error
//         console.log(error);
//     })

if(document.forms.cake){
    document.forms.cake.addEventListener('submit', function (e) {
    e.preventDefault();
    const fd = new FormData(this);
    // console.log('object :', this);
    axios({
        method: 'post',
        url: '/cake',
        data: fd
        })
        .then(response=>{
            // console.log(response.data)
            if (response.status === 200) {
                alert('ok')
                cartIcon(response.data)
                // console.log('object :', );
            }
            // console.log('object :', response);
        // return response.json();
        showCart(response.data);
        })
        .catch(function (error) {
        console.log(error);
        });
});
}

const cartIcon = (data) =>{

    let cart = document.querySelector('.cart-link');
    let cartCount = document.querySelector('.cart-count');
    // cart.classList.add('count');
    cartCount.innerHTML = data.length;
}

if(document.querySelector('.add-to-cart')){
    document.querySelector('.add-to-cart').addEventListener('submit', function (e) {
    e.preventDefault();
    const fd = new FormData(this);
// console.log('object :', e.target);
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

if (document.querySelector('.cart-modal')) {
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
}

    

});


if (document.querySelector('input[name="delivery"]')) {
    let delivery = document.querySelectorAll('input[name="delivery"]');
    for (const iterator of delivery) {
        iterator.addEventListener('change', (e)=>{
            document.querySelector('.delivery-info').classList.toggle('show');
            document.querySelector('.cafe-info').classList.toggle('show');
        });
    }
};

// if(document.querySelector('input[name="date"]')){
//     let date;
//     document.querySelector('input[name="date"]').addEventListener('input', (e)=>{
//         // booki = new Date(e.target.value).getHours();
//         date = e.target.value;
//         // date = e.target.value.split('-');
//         document.querySelector('input[name="time"]').removeAttribute('disabled');
//     })
//     document.querySelector('input[name="time"]').addEventListener('input', (e)=>{
//         let time = e.target.value;
//         // let time = e.target.value.split(':');
//         // const utcDate = new Date(Date.UTC(date[0], date[1]-1, date[2], time[0], time[1])/1000);
//         document.querySelector('input[name="booking"]').value = date+' '+time+':00';
//         // document.querySelector('input[name="booking"]').value = utcDate.valueOf();

//     })
// }

// //web
// <div class="steps">
//     <input type="file" name="image" id="" multiple/>
//     <input type="text" name="" id="" />
// </div>
// <div class="steps">
//     <input type="file" name="image" id="" multiple />
//     <input type="text" name="" id="" />
// </div>

// //js
// if(document.forms.cake){
//     let steps = document.querySelectorAll('.steps');
//     document.forms.cake.addEventListener('submit', function (e) {
//     e.preventDefault();
//     let step = '';
//     for (const iterator of steps) {
//         step+='<img src="/images/recipe/'+iterator.children.value+'" /> <br>';      //тут нужно отловить картинку чаилдом или дугим методом
//         step+='<p>'+iterator.subling.value+'</p> <br>';       //тут нужно отловить text чаилдом или дугим методом
//     }
//     const fd = new FormData(this);
//     fd.append('steps', step);
//     // console.log('object :', fd);
//     axios({
//         method: 'post',
//         url: '/pecipe/add',
//         data: fd
//         })
//         .then(response=>{
//             // console.log('object :', response);
//         // return response.json();
//         })
//         .catch(function (error) {
//         console.log(error);
//         });
// });
// }
// //php store
// //это метод, что есть таблица с картинками и она many-to-many с рецептами, и в нее пишет через связь все картинки, их имена, и потом вытягивать
// $recipe = Recipe::create($request->all())
// if($request->file('image')){
//     $images = array();
//     $insert = array();
//     foreach($request->file('image') as $img){
//         $name='user_'.$img->getClientOriginalName();
//         $img->move('images/recipe',$name);
//         $name = '/images/recipe/'.$name;
//         $im = Image::create(['url' => $name, 'alt' => 1]);
//         $insert[]=$im->id;
//     }
//     $recipe->images()->sync($insert);
// };
