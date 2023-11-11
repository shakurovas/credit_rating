const mySort = document.querySelectorAll('.my-sort');

if ( mySort.length ){

    mySort.forEach( ms => {

        const currentValue = ms.querySelector('.my-sort__current-value');

        let activeItem = ms.querySelector('input:checked');

        if ( activeItem ){
            currentValue.innerHTML = activeItem.value;
        } else{
            currentValue.innerHTML = ms.getAttribute('data-default')
        }


        ms.addEventListener('click', function(){
            this.classList.toggle('active');
        })


        const items = ms.querySelectorAll('input[type="radio"]');
        items.forEach( item =>  {
            item.addEventListener('change', function(){
                currentValue.innerHTML = this.value;

                this.closest('.my-sort').classList.remove('active');

                document.querySelector('input[name="orderby"]').value = this.value;
            })
        })

    } )
}