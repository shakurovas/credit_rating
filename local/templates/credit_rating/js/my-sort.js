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

                if (this.value == 'По популярности') {
                    sort_by_param = 'PROPERTY_SERVICE_RATING';
                    sort_order = 'DESC';
                } else if (this.value == 'По ставке') {
                    sort_by_param = 'PROPERTY_RATE';
                    sort_order = 'ASC';
                } else if (this.value == 'По сумме') {
                    sort_by_param = 'PROPERTY_SUM';
                    sort_order = 'DESC';
                } else if (this.value == 'По стоимости обслуживания') {
                    sort_by_param = 'PROPERTY_SERVICE_COST';
                    sort_order = 'ASC';
                } else if (this.value == 'По бонусному %') {
                    sort_by_param = 'PROPERTY_BONUS_PERCENT';
                    sort_order = 'DESC';
                } else if (this.value == 'По периоду без %') {
                    sort_by_param = 'PROPERTY_FREE_PERIOD';
                    sort_order = 'DESC';
                }
                
                let link = location.href;

                if (link.indexOf("?") >= 0) {
                    link += "&sort_by=" + sort_by_param + "&order=" + sort_order;
                } else {
                    link += "?sort_by=" + sort_by_param + "&order=" + sort_order;
                }

                $.ajax({
                    url: link,
                    method: 'post',
                    dataType: 'html',
                    data: {sort_by: this.value},
                    success: function(data){
                        var targetContainer = $('.news-list')           //  Контейнер, в котором хранятся элементы
                        var elements = $(data).find('.news-item')       //  Ищем элементы
                        pagination = $(data).find('.show-more-block');  //  Ищем навигацию

                        $('.show-more-block').remove();                 //  Удаляем старую навигацию
                        targetContainer.html(elements);                 //  Заменяем элементы в контейнере
                        targetContainer.after(pagination);              //  Добавляем навигацию следом
                    }
                });
                
                this.closest('.my-sort').classList.remove('active');

                document.querySelector('input[name="orderby"]').value = this.value;
                
            })
        })

    } )
}
