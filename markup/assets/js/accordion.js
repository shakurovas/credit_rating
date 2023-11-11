const accordions = document.querySelectorAll('.accordion');

if ( accordions.length ){
    
    accordions.forEach( accordion => {
        

        const mode = accordion.getAttribute('data-mode') === 'single' ? true : false;
        const accordionItems = accordion.querySelectorAll(':scope > .accordion-item');
        


        let duration = Number(accordion.getAttribute('data-duration'));

        if ( duration <= 150 ) duration = 300;


        const arrows =   accordion.querySelectorAll('.accordion-arrow');     
        if ( arrows.length ){
            arrows.forEach( arrow => {
                arrow.style.transitionDuration = duration + 'ms';
            } )
        }


        if ( accordionItems.length ){
            accordionItems.forEach( (accordionItem, index) => {
                accordionItem.setAttribute('data-index', index);

                const accordionHeader = accordionItem.querySelector('.accordion-header');
                const accordionBody = accordionItem.querySelector('.accordion-body');
                
                let itemState = accordionItem.classList.contains('collapsed') ? false : true;
                let proccessing = 0;
                
                

                accordionHeader.addEventListener( 'click', function(){

                    const parent = this.closest('.accordion-item');
                    const parentIndex = parent.getAttribute('data-index');

                    let paddingTop, paddingBottom, marginTop, height;    

                    if ( mode ){
                        accordionItems.forEach( openItem => {
                            if ( !openItem.classList.contains('collapsed')  && !openItem.classList.contains('collapsing') &&  openItem.getAttribute('data-index') !== parentIndex ){
                                const  openItemHeader = openItem.querySelector('.accordion-header');
                                openItemHeader.click();
                            }
                        } )
                    }


                    if ( proccessing === 0 ){
                        
                        proccessing = 1;
                        /*Если свернут*/
                        if ( itemState === false ){
                            parent.classList.add('opening');

                            const accordionBodyStyles = getComputedStyle(accordionBody);

                            paddingTop =      parseInt(accordionBodyStyles.paddingTop);
                            paddingBottom =   parseInt(accordionBodyStyles.paddingBottom);
                            marginTop =       parseInt(accordionBodyStyles.marginTop);
                            height =          parseInt(accordionBodyStyles.height);

                            
                            accordionBody.style.paddingTop = '0px';
                            accordionBody.style.paddingBottom = '0px';
                            accordionBody.style.marginTop = '0px';
                            accordionBody.style.height = '0px';
                            accordionBody.style.overflow = 'hidden';
                            accordionBody.style.position = 'relative';
                            accordionBody.style.visibility = 'visible';

                            

                            function openAccordionAnimate(duration){
                                return new Promise((resolve, reject) => {
                                    openParam(accordionBody, 'height', 0, height, duration);
                                    openParam(accordionBody, 'paddingBottom', 0, paddingBottom, duration);
                                    openParam(accordionBody, 'paddingTop', 0, paddingTop, duration);
                                    openParam(accordionBody, 'marginTop', 0, marginTop, duration);
                                    
                                    setTimeout(()=>{
                                        resolve();
                                    }, duration + 20)
                                });
                            }
                            
                            openAccordionAnimate(duration).then( ()=>{
                                parent.classList.remove('opening');
                                parent.classList.remove('collapsed');
                                accordionBody.removeAttribute('style');
                                proccessing = 0;
                                itemState = true;

                            } );
                            /*accordionBody.style.position = 'absolute';
                            accordionBody.style.visib = 'block';
                            accordionBody.style.display = 'block';*/
                            
                        } else{
                        /*Если развернут - закрываем*/
                            
                            proccessing = 1;
                            parent.classList.add('collapsing');
                            const accordionBodyStyles = getComputedStyle(accordionBody);

                            paddingTop =      parseInt(accordionBodyStyles.paddingTop);
                            paddingBottom =   parseInt(accordionBodyStyles.paddingBottom);
                            marginTop =       parseInt(accordionBodyStyles.marginTop);
                            height =          parseInt(accordionBodyStyles.height);
                            accordionBody.style.overflow = 'hidden';

                            function closeAccordionAnimate(duration){
                                return new Promise((resolve, reject) => {
                                    openParam(accordionBody, 'height', height, 0, duration);
                                    openParam(accordionBody, 'paddingBottom', paddingBottom, 0, duration);
                                    openParam(accordionBody, 'paddingTop', paddingTop, 0, duration);
                                    openParam(accordionBody, 'marginTop', marginTop, 0, duration);
                                    
                                    setTimeout(()=>{
                                        resolve();
                                    }, duration + 20)
                                });
                            }


                            closeAccordionAnimate(duration).then(()=>{
                                parent.classList.add('collapsed');
                                parent.classList.remove('collapsing');
                                accordionBody.removeAttribute('style');
                                proccessing = 0;
                                itemState = false;
                            });
                            
                        }
                        


                    } else{
                        
                        return false;

                    }

                    
                } )

            } )
        }

    } )

}


function openParam(element, param, initialValue, targetValue, duration){
    const start = performance.now();
    function openBodyAccordion(timestamp) {
        const elapsed = timestamp - start;        
        const progress = elapsed / duration;
        
        
        // Изменение ширины линии элемента от initialLineWidth до targetLineWidth
        const currentParamValue = initialValue + progress * (targetValue - initialValue);
        element.style[param] = `${currentParamValue}px`;
      
        if (elapsed < duration) {
            requestAnimationFrame(openBodyAccordion);
            
        } else{
            
        }
      }
      
    requestAnimationFrame(openBodyAccordion) 
}

