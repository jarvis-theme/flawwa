<div class="btn-group">
    <button class="btn dropdown-toggle" data-toggle="dropdown">
        <i class="icon-shopping-cart"></i> 
        ({{Shpcart::wishlist()->total_items()}}) 
        <span class="caret"></span>
    </button>
    <div class="dropdown-menu cart-content pull-right">
        <table class="table-cart">
            <tbody>
                @foreach (Shpcart::wishlist()->contents() as $key => $cart)
                    <tr>
                        <td class="cart-product-info">
                            <a href=""><img src="{{url(getPrefixDomain().'/produk/'.$cart['image'])}}" alt="product image"></a>
                            <div class="cart-product-desc">
                                <p><a class="invarseColor" href="#">{{$cart['name']}}</a></p>
                            </div>
                        </td>
                        <td class="cart-product-setting">
                            <p><strong>{{ $cart['qty']}}x</strong></p>
                        </td>
                    </tr>
                @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td class="cart-product-info">
                    <a href="{{url('checkout')}}" class="btn btn-small btn-primary">Checkout</a>
                </td>
                <td>
                    <h3>{{ Shpcart::wishlist()->total_items()}}</h3>
                </td>
            </tr>
        </tfoot>
        </table>
    </div>
</div>