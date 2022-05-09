/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

const buttons = document.querySelectorAll('.delete-post-btn');

buttons.forEach( el => {
    el.addEventListener('click', function(e){
        e.preventDefault();
        
        const btn = e.target; 
        const form = btn.parentNode;
        if(form && confirm('Sei sicuro di voler eliminare questo elemento?')) {
            console.log(form)
            form.submit();
        }
    })
});