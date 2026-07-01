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
const orderButton = document.querySelector('#simplecheckout_button_confirm')
const orderMessage = document.querySelector('#basket-order-message')

const getSelectedLabel = (selector) => {
    const selected = document.querySelector(`${selector}:checked`)

    if (!selected) {
        return ''
    }

    const label = selected.closest('label')

    return label ? label.textContent.replace(/\s+/g, ' ').trim() : selected.value
}

const setOrderMessage = (message, type = 'success') => {
    if (!orderMessage) {
        return
    }

    orderMessage.textContent = message
    orderMessage.classList.remove('none', 'basket-order-message--success', 'basket-order-message--error')
    orderMessage.classList.add(`basket-order-message--${type}`)
}

const clearBasketAfterOrder = () => {
    localStorage.removeItem('order')
    forAsyncBasket = []
    allProdBasket.innerHTML = ''
    setCartCountBasket(forAsyncBasket)
    subtotalSum.textContent = '0'
    totalSum.textContent = '0'
}

const onOrderSubmit = async (event) => {
    event.preventDefault()

    const currentProducts = JSON.parse(localStorage.getItem('order')) || []
    const customerName = document.querySelector('#customer_firstname')?.value.trim() || ''
    const customerEmail = document.querySelector('#customer_email')?.value.trim() || ''
    const customerPhone = document.querySelector('#customer_telephone')?.value.trim() || ''

    if (!currentProducts.length) {
        setOrderMessage('Корзина пуста.', 'error')
        return
    }

    if (!customerName || !customerPhone) {
        setOrderMessage('Заполните ФИО и телефон.', 'error')
        return
    }

    const formData = new FormData()
    formData.append('action', 'inmi_send_basket_order')
    formData.append('nonce', inmiBasketOrder.nonce)
    formData.append('customer_name', customerName)
    formData.append('customer_email', customerEmail)
    formData.append('customer_phone', customerPhone)
    formData.append('shipping', getSelectedLabel('input[name="shipping_method"]'))
    formData.append('address', document.querySelector('#shipping_address_address_1')?.value.trim() || '')
    formData.append('payment', getSelectedLabel('input[name="payment_method"]'))
    formData.append('comment', document.querySelector('#comment')?.value.trim() || '')
    formData.append('total', totalSum.textContent.trim())
    formData.append('products', JSON.stringify(currentProducts))

    orderButton.classList.add('disabled')
    orderButton.setAttribute('aria-disabled', 'true')
    setOrderMessage('Отправляем заказ...', 'success')

    try {
        const response = await fetch(inmiBasketOrder.ajaxUrl, {
            method: 'POST',
            body: formData,
        })
        const result = await response.json()

        if (!response.ok || !result.success) {
            throw new Error(result.data?.message || 'Не удалось отправить заказ.')
        }

        clearBasketAfterOrder()
        setOrderMessage(result.data?.message || 'ваш заказ сформирован и направлен менеджеру', 'success')
    } catch (error) {
        setOrderMessage(error.message || 'Не удалось отправить заказ.', 'error')
    } finally {
        orderButton.classList.remove('disabled')
        orderButton.removeAttribute('aria-disabled')
    }
}

if (orderButton) {
    orderButton.addEventListener('click', onOrderSubmit)
}


getData();



