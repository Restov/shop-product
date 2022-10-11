$(document).ready(function () {
    // $('body').on('click', '.product__buttons-number-minus, .product__buttons-number-plus', function () {
    //     let $row = $(this).closest('.product__buttons-number')
    //     let $input = $row.find('.product__buttons-number-text')
    //     let step = $row.data('step')
    //     let val = parseFloat($input.val())
    //     $(this).hasClass('product__buttons-number-minus') ? val -= step : val += step
    //     $input.val(val)
    //     $input.change()
    // });

    // $('body').on('change', '.product__buttons-number-text', function () {
    //     let $input = $(this)
    //     let $row = $input.closest('.product__buttons-number');
    //     let step = $row.data('step')
    //     let min =  parseInt($row.data('min'))
    //     let max = parseInt($row.data('max'))
    //     let val = parseInt($input.val())
    //     if (isNaN(val))
    //         val = step
    //     else if (min && val < min)
    //         val = min;
    //     else if (max && val > max)
    //         val = max
    //     $input.val(val)
    // });

    $('body').on('click', '.product__buttons-number-minus, .product__buttons-number-plus', function () {
        let $row = $(this).siblings(("input"))
        let step = parseInt($row.attr('step'))
        let val = parseInt($row.val())
        $(this).hasClass('product__buttons-number-minus') ? val -= step : val += step
        $row.val(val)
        $row.change()
    })

    $('body').on('change', '.product__buttons-number-text', function () {
        let $input = $(this)
        let step = parseInt($input.attr('step'))
        let min = parseInt($input.attr('min'))
        let max = parseInt($input.attr('max'))
        let val = parseInt($input.val())
        if (isNaN(val))
            val = step
        else if (min && val < min)
            val = min;
        else if (max && val > max)
            val = max
        $input.val(val)
    })

    $('.product__image__pick-item').hover(function () {
        let $this = $(this)
        let $child = $this.find('img')
        let src = $child.attr('src')
        let $main = $this.closest('.product__image').find('.product__image-main')
        if (src != "img/img2.png") {
            $main.attr('src', src)
            $main.addClass('product__image-main--active')
        }
        else {
            $main.attr('src', "img/img1.png")
        }
    })


    $('body').on('click', '.product__button--add', function () {
        let $input = $(".product__buttons-number-text")
        let tov = 'товар'
        if ($input.val() > 1 && $input.val() < 5)
            tov = 'товара'
        else if ($input.val() > 4)
            tov = 'товаров'

        let text = `В корзину добавлен${$input.val() === '1' ? '' : 'о'} ${$input.val()} ${tov}`
        $.notify(text, "info");

        // $.ajax({
        //     url: '/cart/add',
        //     data: {
        //         count: $input.val()
        //     },
        //     success: function (data) {
        //        console.log("success")
        //     }
        // })
    })
});