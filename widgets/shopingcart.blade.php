<i class="fa fa-shopping-cart"></i> {{ Shpcart::cart()->total_items() }} Items
<p class="totalprice">Total: {{ price(Shpcart::cart()->total() )}}</p>