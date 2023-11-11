const hamburger = document.querySelector('.hamburger');
const mobMenu = document.querySelector('.mob-menu');
const mobMenuHide = document.querySelector('.mob-menu__hide');
const btnSearch = document.querySelector('.button-search');
const header = document.querySelector('header');
const searchReset = document.querySelector('.search-reset');
const searchInput = document.querySelector('.input-search');

if (typeof hamburger !== 'undefined' && hamburger != null) {
    hamburger.addEventListener('click', function(){
        if ( !this.classList.contains('active') ){
            this.classList.add('active');
            mobMenu.classList.add('active');
        } else{
            this.classList.remove('active');
            mobMenu.classList.remove('active');
        }
    })
}

if (typeof mobMenuHide !== 'undefined' && mobMenuHide != null) {
    mobMenuHide.addEventListener('click', function(){
        hamburger.classList.remove('active');
        mobMenu.classList.remove('active');
    })
}

if (typeof btnSearch !== 'undefined' && btnSearch != null) {
    btnSearch.addEventListener('click', function(){
        header.classList.add('search-mode')
    })
}

if (typeof searchReset !== 'undefined' && searchReset != null) {
    searchReset.addEventListener('click', function(){
        searchInput.value = '';
        header.classList.remove('search-mode')
    })
}




/********************************************************************* */

//const searchFormWithHint = document.querySelector('.h-search-form');

const searchHintsList = document.querySelector('.search-hints');
const searchHints = document.querySelectorAll('.search-hint');
const searchNoResult = document.querySelector('.search-hints .search-no-result');

const hSearch = document.querySelector('.h-search');
const hideHSearch = document.querySelector('.h-search__hide');





function clearHints(list){
    list.forEach( hint => {
        hint.innerHTML = hint.innerHTML.replace(/<\/?[^>]+(>|$)/g, "");
    })
}


function preparingHintsList(searchString, list){
    let _searchString = searchString;
    let regexp = new RegExp(`${_searchString}`, 'i')
    let searchCount = 0;
    
    clearHints(list);

    if ( _searchString.length > 3 ){

        searchHintsList.classList.add('active');

        let searchCount = 0;
        list.forEach( hint => {
            let searchVariants = hint.innerHTML;
            
            if ( regexp.test(searchVariants) ){
                
                
                var s = searchString;
                var regExp = RegExp(s, 'i');
                let m = searchVariants.replace(regExp, '<b class="text-primary">$&</b>');
                hint.innerHTML = m;
                hint.classList.add('active');
                searchCount++;
                
            } else{
                hint.classList.remove('active');
            }
        })

        
        
        if ( searchCount < 1 ){
            searchNoResult.classList.add('active')
        } else {
            searchNoResult.classList.remove('active');
            
        }

    } else {
        searchHintsList.classList.remove('active');
        
        searchNoResult.classList.remove('active');
        searchInput.classList.remove('active');
        list.forEach( hint => {
            hint.classList.remove('active');
        })
    }
}


if ( searchInput && searchHintsList ){

    
    searchHints.forEach( hint => {

        hint.addEventListener('click', function(){

            let value  = hint.innerHTML.replace(/<\/?[^>]+(>|$)/g, "");

            searchInput.value = value;
            

        })


    } )


    searchInput.addEventListener('focus', function(){
        
        preparingHintsList(this.value, searchHints);
        
        let searchString = this.value;
        if ( searchString.length > 2 ){
            searchInput.classList.add('active');
        }
        
    })
    searchInput.addEventListener('blur', function(){     
        
        setTimeout( ()=>{
            searchHintsList.classList.remove('active');
            searchInput.classList.remove('active');
            
            let iv = searchInput.value;
        
            if (iv.length < 3){
                searchHints.forEach( hint => {
                    hint.classList.remove('active');
                })
            }
        }, 200 )

        
        
    })
    searchInput.addEventListener('input', function(){
                
        preparingHintsList(this.value, searchHints);

    })


    searchHints.forEach( hint => {
        hint.addEventListener('click', function(){
            let value = this.innerHTML;
            value = value.replace(/<\/?[^>]+(>|$)/g, "");
            
            searchHintsList.classList.remove('active');
            
            searchInput.value = value

        })
    })
}


let ratingSliders = document.querySelectorAll('.swiper.top-rating-swiper');

if ( ratingSliders.length ) {
    ratingSliders.forEach( rs => {
        let ratingSlider = new Swiper(rs, {
            speed: 500,
            
            slidesPerView: 1.1,
            spaceBetween: 6,
            
            
            
            
            breakpoints: {
                380: {
                    slidesPerView: 2.1,
                    spaceBetween: 6
                },
                540: {
                    slidesPerView: 2.5,
                    spaceBetween: 12
                },
                768: {
                    slidesPerView: 3.5,
                    spaceBetween: 16
                },
                992: {
                    slidesPerView: 4,
                    spaceBetween: 16
                }
            }
        })
    } )
}


let sliderReviews = new Swiper(".swiper.swiper-reviews", {
    speed: 1000,
    
    slidesPerView: 1.1,
    spaceBetween: 8,
    watchSlidesProgress: true,

    navigation: {
        nextEl: '.reviews-nav.next',
        prevEl: '.reviews-nav.prev',
    },
    breakpoints: {
        480: {
            slidesPerView: 1.75,
            spaceBetween: 8
        },
        768: {
            slidesPerView: 2.1,
            spaceBetween: 8
        },
        992: {
            slidesPerView: 3,
            spaceBetween: 16
        }
    }
})
function blurOfInputFilter(input, range, slider, minmax = false){
    
    let changeValue = input.value;
    changeValue = parseInt(changeValue.match(/\d+/));


    if ( input.value.length === 0 || !changeValue ){
        if (minmax === false){
            input.value = range[0];

            let staicValue = slider.get()[1];
            slider.set([range[0], staicValue]);
            return true
        } else{
            input.value = range[1];

            let staicValue = slider.get()[0];
            slider.set([staicValue, range[0] ]);
            return true
        }
    } else{
        let currentValue = input.value;
        currentValue = parseInt(currentValue.match(/\d+/));
        
        if (minmax === false){
            if ( currentValue < range[0]) {
                input.value = range[0];  
                let staicValue = slider.get()[1];
                slider.set([range[0], staicValue]);                  
                return true
            }
            if ( currentValue > range[1] ) {
                input.value = range[1];
                let staicValue = slider.get()[1];
                slider.set([range[1], staicValue]);  
                return true
            }
            
            
            
            
        } else{
            if ( currentValue > range[1]) {
                input.value = range[1];

                let staicValue = slider.get()[0];
                
                slider.set([staicValue, range[1]]);                  
                return true
            }
            
            if ( currentValue < slider.get()[0]) {
                
                input.value = slider.get()[0];
                let staicValue = slider.get()[0];
                slider.set([staicValue, staicValue]);                  
                return true
            }
            
            return true
        }
    }
    
}

function inputInField(input, slider, range, pos = 0){

    let changeValue = input.value
    changeValue = parseInt(changeValue.match(/\d+/));
    changeValue = changeValue + 0.0001;
    
    
    if ((changeValue < range[0] || changeValue > range[1]) && !changeValue) {
        
        return false;
    } else{
        
        return changeValue;
        
    }
    


    
    
}

function initRangeSlider(sliderNode, minSelector,  helpTextType = 'suffix', minHelpText=' ₽'){
    let minValue = 0;
    let maxValue = 0;

    let focusMin = 0;
    let focusMax = 0;
    
    let sliderMinTextValue = document.querySelector(minSelector);
    
    let minMask = IMask(sliderMinTextValue, {
        mask: 'num' + ' ' + minHelpText  ,
                lazy: false,
                blocks: {
                    num: {
                        mask: Number,                            
                        
                    }
        }
    });

    let _min = Number( sliderNode.getAttribute('data-min') );
    let _max = Number( sliderNode.getAttribute('data-max')) ;
    let _step = Number( sliderNode.getAttribute('data-step')) ;
    minValue = _min;
    maxValue = _max;

   // значение по умолчанию из инпута
    var defaultValue = parseInt($(minSelector).val());

    if (defaultValue == null || typeof defaultValue === 'unedfined' || defaultValue == '' || isNaN(defaultValue))
        defaultValue = _min;

    let slider = noUiSlider.create(sliderNode, {
        start: defaultValue,
        connect: [true, false],
        step: _step,
        range: { 'min': _min, 'max': _max },
    });

    

    sliderMinTextValue.addEventListener('focus', function(){
        minMask._onChange();
        focusMin = parseInt(this.value.match(/\d+/));
        focusMin = focusMin + 0.000001;

        let caretPos = Math.trunc(focusMin);
        caretPos = String(caretPos);
        
        
        
        
    })
    function setCaretPosition(elem, caretPos) {
        
        if(elem != null) {
            if(elem.createTextRange) {
                var range = elem.createTextRange();
                range.move('character', caretPos);
                range.select();
            }
            else {
                if(elem.selectionStart) {
                    elem.focus();
                    elem.setSelectionRange(caretPos, caretPos);
                }
                else
                    elem.focus();
            }
        }
    }
    

    sliderMinTextValue.addEventListener('blur', function(){
        blurOfInputFilter(this, [minValue, maxValue], slider,false)
    })
    sliderMinTextValue.addEventListener('input', function(){

        let currentValue = this.value;
        currentValue = parseInt(currentValue.match(/\d+/));
        currentValue = currentValue + 0.000001;
        
        if ( currentValue > minValue && currentValue <= maxValue){
            let tValue = inputInField(this, slider, [minValue, maxValue],  1);
            
            if ( tValue !== false){
                let tValue = inputInField(this, slider, [minValue, maxValue],  1);
                
                
                slider.set([tValue, false]);
                
            }
        } 
    })
    
    function sliderUpdate(){
        let range = this.get();
        
        range = range + 0.0000001;
        range = parseInt(range, 10);
        minMask._onChange();
        
        
                
        if ( helpTextType === 'suffix'){
            sliderMinTextValue.value = Math.trunc(range) +' '+ minHelpText;
            
        } else{
            sliderMinTextValue.value = minHelpText + Math.trunc(range);
            
        }
    }
    
    
    slider.on('update', sliderUpdate);

    
    
    
    
}



const sliderAmount = document.querySelector('#slider-amount');
const sliderTimeFrame = document.querySelector('#slider-timeframe');



if ( sliderAmount ){
    initRangeSlider(sliderAmount, '#amount',  'suffix', '₽')
}

let timeframe_input = document.querySelector('#timeframe');
if (typeof timeframe_input === 'undefined' || timeframe_input == null) {
    var unit_name = '';
} else {
    var unit_name = timeframe_input.getAttribute('data-unit');
}

if ( sliderTimeFrame ){
    initRangeSlider(sliderTimeFrame, '#timeframe',  'suffix', unit_name);
}


let showMoreFilters = document.querySelector('.filter-form__more-filters');
let deepFilters = document.querySelector('.deep-filters');
let deepFiltersInner = document.querySelector('.deep-filters__inner');




if ( showMoreFilters ){
    showMoreFilters.addEventListener('click', function(){
        if ( this.classList.contains('active') ){
            this.classList.remove('active');
            deepFilters.classList.remove('active');
           
           
        } else{
            this.classList.add('active');
            deepFilters.classList.add('active');            
        }
    })
}

const filterForm = document.querySelector('.filter-form');
const filterFormControls = document.querySelector('.filter-form__controls');
const filterFormSubmit = document.querySelector('.filter-form__submit');
const hideMobFilter = document.querySelector('.mob-filter__hide');
const showMobFilter = document.querySelector('.show-mob-filter__btn');



if ( filterForm ){

    hideMobFilter.addEventListener('click', function(event){
        
        filterForm.classList.remove('active');
    })
    showMobFilter.addEventListener('click', function(event){
        
        filterForm.classList.add('active');
    })

    document.addEventListener('DOMContentLoaded', function(){
        if ( document.documentElement.clientWidth < 768){
            filterForm.append(filterFormSubmit);
        }
    })

    window.addEventListener('resize', function(){
        if ( document.documentElement.clientWidth < 768){
            filterForm.append(filterFormSubmit);
        } else{
            filterFormControls.append(filterFormSubmit);
        }
    })
}





let selectionSliders = document.querySelectorAll('.swiper.selection-swiper');


if ( selectionSliders ){
    selectionSliders.forEach( ss => {
        let sl = new Swiper(".swiper.selection-swiper", {
            speed: 1000,
            slidesPerView: "auto",
            spaceBetween: 6,
            freeMode: true,
            watchSlidesProgress: true,

            navigation: {
                nextEl: '.selection-slider__next',
                prevEl: '.selection-slider__prev',
            },
            breakpoints: {
                
                992: {            
                    spaceBetween: 12
                }
            }
    
        })
    } )
    
}
