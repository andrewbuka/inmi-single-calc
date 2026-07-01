const prodCountBasket = document.querySelector('.count-prod')
const allProdBasket = document.querySelector('.t-body-basket')
const emptyBasket = document.querySelector('.empty-basket')
const basketFull = document.querySelector('.tttt')



const subtotalSum = document.querySelector('.subtotal-sum')
const totalSum = document.querySelector('.total-sum')

let forAsyncBasket = [];
let isEdit = false;

const getData = () => {
    const data = JSON.parse(localStorage.getItem('order'));
    if(data && data.length !== 0) {
        emptyBasket.classList.add('none')
        basketFull.classList.remove('none')
        forAsyncBasket = data
        setCartCountBasket(forAsyncBasket)

        setBasket(forAsyncBasket)
    } else {
        emptyBasket.classList.remove('none')
        basketFull.classList.add('none')

    }
}

const setCartCountBasket = (products) => {
    let count = 0;
    let sum = 0;
    products.forEach(prod => {
        count = count + prod.count

        sum = sum + +prod.count*(+prod.price)
    })

    prodCountBasket.textContent = count
    subtotalSum.textContent = sum
    totalSum.textContent = sum

    if(!products.length) {
        emptyBasket.classList.remove('none')
        basketFull.classList.add('none')
    }
}

const setBasket = (products) => {
    products.forEach(prod => {
        const prodImg = DomHelper.createImage([{ prop: 'src', value: prod.src }])
        const imgBox = DomHelper.createImageBox([prodImg])

        const prodLabel = DomHelper.createNameProd(prod.title)
        const labelBox = DomHelper.createNameBox([prodLabel])

        // count
        const minus = DomHelper.createImageEdit([{ event: 'click', handler: onMinus}], '-')
        const prodCountBasketInput = DomHelper.createCountProdInput([{prop: 'name', value: 'count' }, {prop: 'value', value: prod.count}])
        const plus = DomHelper.createPlus([{ event: 'click', handler: onPlus}], '+')
        const deleteBtn = DomHelper.createDeleteEdit([{ event: 'click', handler: onDeleteProd}], 'X')       
        const preProdBox = DomHelper.createCountPredProdBox([minus, prodCountBasketInput, plus, deleteBtn])
        const ProdBox = DomHelper.createCountProdBox([preProdBox])

        // price
        const price = DomHelper.createPrice(`${prod.price} руб.`)
        const priceBox = DomHelper.createPriceBox([price])

        // total
        const totalSum = +prod.price*+prod.count
        const total = DomHelper.createTotal(`${totalSum} руб.`)



        const prodItem = DomHelper.createProdItem([{ prop: 'id', value: prod.id }], [imgBox, labelBox, ProdBox, priceBox, total])

        allProdBasket.append(prodItem)
    })
}

const onMinus = (event) => {
   const prod = event.target.closest('.prod-item-tr')
    const prodId = prod.getAttribute('id')
    const prodinput = prod.querySelector('.input-btn-basket')
    

    prodinput.value = +prodinput.value -1;
    

    if(+prodinput.value===0) {
        forAsyncBasket = forAsyncBasket.filter(item => item.id !== prodId)
        localStorage.setItem('order', JSON.stringify(forAsyncBasket));
        setCartCountBasket(forAsyncBasket)
        prod.remove()
    } else {
        forAsyncBasket = forAsyncBasket.map(item => {
            if(item.id === prodId) {
                return item = {...item, count: +prodinput.value}
            }

            return item
        })

        localStorage.setItem('order', JSON.stringify(forAsyncBasket));
        setCartCountBasket(forAsyncBasket)
    }

}
const onPlus = (event) => {
   const prod = event.target.closest('.prod-item-tr')
    const prodId = prod.getAttribute('id')
    const prodinput = prod.querySelector('.input-btn-basket')
    

    prodinput.value = +prodinput.value +1;
    

    
        forAsyncBasket = forAsyncBasket.map(item => {
            if(item.id === prodId) {
                return item = {...item, count: +prodinput.value}
            }

            return item
        })

        localStorage.setItem('order', JSON.stringify(forAsyncBasket));
        setCartCountBasket(forAsyncBasket)

}
const onDeleteProd = (event) => {
    const prod = event.target.closest('.prod-item-tr')
    const prodId = prod.getAttribute('id')


    forAsyncBasket = forAsyncBasket.filter(item => item.id !== prodId)
    localStorage.setItem('order', JSON.stringify(forAsyncBasket));
    setCartCountBasket(forAsyncBasket)
    prod.remove()

}

const onEdit = (event) => {
    const prod = event.target.closest('.prod-item')
    const prodId = prod.getAttribute('id')
    const edit = prod.querySelector('.basket-item-count-par-box')
    const editInput = prod.querySelector('.basket-item-count-input-box')
    if(!isEdit) {
        isEdit = true;
        edit.classList.add('none')
        editInput.classList.remove('none')
    }
}

const onExcept = (event) => {
    const prod = event.target.closest('.prod-item')
    const prodId = prod.getAttribute('id')
    const edit = prod.querySelector('.basket-item-count-par-box')
    const editValue = prod.querySelector('.basket-item-count-par')
    const editInput = prod.querySelector('.basket-item-count-input-box')
    const editInputValue = prod.querySelector('.basket-item-count-input')
    if(isEdit) {
        isEdit = false;
        edit.classList.remove('none')
        editInput.classList.add('none')

        forAsyncBasket = forAsyncBasket.map(item => {
            if(item.id === prodId) {
                return item = {...item, count: +editInputValue.value}
            }

            return item
        })

        localStorage.setItem('order', JSON.stringify(forAsyncBasket));
        setCartCountBasket(forAsyncBasket)

        editValue.textContent = `${editInputValue.value} шт`
    }
}










getData();



