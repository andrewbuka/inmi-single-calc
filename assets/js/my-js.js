const btnBuy = document.querySelectorAll('.btn-buy')
const refreshProd = document.querySelectorAll('.refresh-prod')
const toCart = document.querySelectorAll('.btn-to-card')
const prodCount = document.querySelector('.count-prod')

const card = document.querySelectorAll('.prod-container')


let forAsync = []

const setFeatures = () => {
    const data = JSON.parse(localStorage.getItem('order'))
    if(data ) {
        forAsync = data;
        setCartCount(forAsync);

        setCard(forAsync)

    }   

}

const onBuyClick = () => {
    btnBuy.forEach((buyItem) => {
        buyItem.addEventListener('click', (event) => {
 
            const product = event.target.closest('.product-item')
            
            const addToCardBox = product.querySelector('.add-to-card-box');

            addToCardBox.classList.remove('none')
            buyItem.classList.add('none')
        })
    })
}

const onRefresh = () => {
    refreshProd.forEach((refreshItem) => {
        refreshItem.addEventListener('click', (event) => {
           
            const product = event.target.closest('.product-item')
            
            const addToCardBox = product.querySelector('.add-to-card-box');
            const buyBtn = product.querySelector('.btn-buy');
            const countInput = product.querySelector('.add-to-card-input');
            

            addToCardBox.classList.add('none')
            buyBtn.classList.remove('none')
            countInput.value = 1
        })
    })
}

const onToCart = () => {
    toCart.forEach(btn => {
        btn.addEventListener('click', (event) => {
            let prodIteminfo;
            const product = event.target.closest('.product-item')
            const productId = product.getAttribute('id');
         
            const count = +product.querySelector('.add-to-card-input').value

            let update = false
           

            fizProductArray.forEach((arrayItem) => {
                if(productId === arrayItem.id) {
                    prodIteminfo = {...arrayItem, count}

                    if(forAsync.length !== 0) {
                        forAsync = forAsync.map(item => {
                            if(prodIteminfo.id === item.id) {
                               
                                 item = {...item, count: prodIteminfo.count + item.count}
                                 update = true;
                            } 
                            return item
                        })

                        if (!update) {
                            forAsync.push(prodIteminfo)
                        }
                    } else {
                        forAsync.push(prodIteminfo)
                    }
                }
                
                
            })


            console.log('forAsync', forAsync)

            localStorage.setItem("order", JSON.stringify(forAsync));

            setCartCount(forAsync);

    
          
            const addToCardBox = product.querySelector('.add-to-card-box');
            const buyBtn = product.querySelector('.btn-buy');
            const countInput = product.querySelector('.add-to-card-input');
            const inBasketP = product.querySelector('.in-basket-p')
            const inBasketSpan = product.querySelector('.in-basket-span')
            

            addToCardBox.classList.add('none')
            buyBtn.classList.add('none')
            inBasketP.classList.remove('none')
            inBasketSpan.textContent = countInput.value

            countInput.value = 1
            
        })
    })
}

const setCartCount = (products) => {
    let count = 0;
    products.forEach(prod => {
        count = count + prod.count
    })

    prodCount.textContent = count
}

const setCard = (order) => {
    card.forEach(item => {
        const cardId = item.querySelector('.product-item').getAttribute('id')
        order.forEach(itemOrder => {
            if(cardId === itemOrder.id) {
                const addToBasket = item.querySelector('.btn-buy')
                const addToCardBox = item.querySelector('.add-to-card-box')
                const inBasketP = item.querySelector('.in-basket-p')
                 const inBasketSpan = item.querySelector('.in-basket-span')
                addToBasket.classList.add('none');
                addToCardBox.classList.add('none');
                inBasketP.classList.remove('none');

                inBasketSpan.textContent =itemOrder.count           
            }
        })

    })
}



setFeatures();
onBuyClick();
onRefresh();
onToCart();