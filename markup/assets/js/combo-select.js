const comboSelects = document.querySelectorAll('.combo-select');


document.addEventListener('click', function(event){
    let t = event.target.closest('.combo-select');
    if ( t === null){
        let activeCS =  document.querySelector('.combo-select.active');
        if ( activeCS ) activeCS.classList.remove('active');
    }
})


if ( comboSelects.length ){

    comboSelects.forEach( cs => {
        let outerBox = cs.querySelector('.combo-select__outer-box');
        let dropList = cs.querySelector('.combo-select__drop');
        let currentValue = cs.querySelector('.combo-select__current-value');
        let qty = cs.querySelector('.combo-select__qty-values');

        


        outerBox.addEventListener('click', function(){
            if (  !cs.classList.contains('active') ){

                let activeCS =  document.querySelector('.combo-select.active');
                if ( activeCS ) activeCS.classList.remove('active');

                cs.classList.add('active');
            } else{
                cs.classList.remove('active')
            }
        })

        const items = cs.querySelectorAll('input[type="radio"]');
        items.forEach( item =>  {
            item.addEventListener('change', function(){
                currentValue.innerHTML = this.value;
                cs.classList.remove('active');                
            })
        })



        if ( cs.getAttribute('data-type') === 'multi' ){
            const defaultText = cs.getAttribute('data-dtext');

            let activeCheckboxes = cs.querySelectorAll('input[type="checkbox"]:checked');

            if ( activeCheckboxes.length ){                
                qty.classList.add('active');
                qty.innerHTML = activeCheckboxes.length;

            } else{
                qty.classList.remove('active');
            }
            
            const checkItems = cs.querySelectorAll('input[type="checkbox"]');
            checkItems.forEach( item =>  {
                item.addEventListener('change', function(){
                    let activeCheckboxes = cs.querySelectorAll('input[type="checkbox"]:checked');

                    if ( activeCheckboxes.length ){
                        qty.classList.add('active');
                        qty.innerHTML = activeCheckboxes.length;
                    } else{
                        qty.classList.remove('active');
                    }     
                    
                })
            })
        }
    } )
}