@extends('pacex.layout')
@section('title','PaceX | Shopping Cart & Checkout')
@section('class', 'class=header-v4')
@section('content')



@if (session('success'))
    <div class="alert alert-success text-center" style="width: fit-content; left: 50%; transform: translateX(-50%);">
        <p>{{ session('success') }}</p>
    </div>
@endif
@if (session('a'))
    <div class="alert alert-danger text-center" style="width: fit-content; left: 50%; transform: translateX(-50%);">
        @foreach (session('a') as $e)
            <p>{{ $e[0] }}</p>
        @endforeach
        
    </div>
@endif
<div class="container">
    <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
        <h1>Shoping Cart</h1>
    </div>
</div>




<!-- Shoping Cart -->
{{-- <form class="bg0 p-t-75 p-b-85"> --}}
{{-- @csrf --}}
<div class="container">
    <div class="row">
        <div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
            <div class="m-l-25 m-r--38 m-lr-0-xl">
                <div class="wrap-table-shopping-cart">
                    <table class="table-shopping-cart">
                        <tr class="table_head">
                            <th class="column-1">Product</th>
                            <th class="column-2"></th>
                            <th class="column-3">Price</th>
                            <th class="column-4">Quantity</th>
                            <th class="column-5">Total</th>
                            {{-- <th class="column-6">Action</th> --}}
                        </tr>
                        @php $totalPrice=0 @endphp
                        @if ($cart)
                            @foreach ($cart as $c)
                                <input type="hidden" id="size{{ $c->id }}" value="{{ $c->size }}">
                                @php
                                    $singleProductPrice = $c->quantity * $c->price;
                                    $totalPrice += $singleProductPrice;
                                @endphp
                                <tr class="table_row">
                                    <td class="column-1">
                                        <div class="how-itemcart1">
                                            <img src="{{ asset('storage/' . $c->image) }}" alt="IMG">
                                        </div>
                                    </td>
                                    <td id="title-size{{ $c->id }}{{ $c->sizeId }}" class="column-2">{{ $c->title }} - {{ $c->size }}</td>
                                    <td class="column-3">$ {{ round($c->price, 2) }}</td>
                                    <td class="column-4">
                                        <div class="wrap-num-product flex-w m-l-auto m-r-0">
                                            <div productPrice="{{ $c->price }}" sizeId="{{ $c->sizeId }}"
                                                productSize="{{ $c->size }}" productId="{{ $c->id }}"
                                                class="btn-num-product-down1 cl8 hov-btn3 trans-04 flex-c-m">
                                                <i class="fs-16 zmdi zmdi-minus"></i>
                                            </div>

                                            <input class="mtext-104 cl3 txt-center num-product" type="number"
                                                name="num-product1" value="{{ $c->quantity }}" readonly>

                                            <div productPrice="{{ $c->price }}" sizeId="{{ $c->sizeId }}"
                                                productSize="{{ $c->size }}" productId="{{ $c->id }}"
                                                class="btn-num-product-up1 cl8 hov-btn3 trans-04 flex-c-m">
                                                <i class="fs-16 zmdi zmdi-plus"></i>
                                            </div>

                                        </div>
                                    </td>
                                    <td id="{{ $c->sizeId }}{{ $c->id }}" class="column-5">$
                                        {{ round($singleProductPrice, 2) }}</td>
                                    <td class="column-1">

                                        <form method="POST" action="/delete-from-cart">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $c->id }}">

                                            <button class="btn btn-danger btn-sm" data-bs-toggle="tooltip"
                                                type="button" title="Remove"
                                                onclick="deleteFromCart('{{ $c->id }}{{ $c->sizeId }}')">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>

                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <td class="column-2">Your Cart Is Empty</td>

                        @endif

                    </table>
                </div>



                <div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
                    <form id="promocode" method="GET" action="/promocodeExists">
                        @csrf
                        @if ($cart)
                            <div class="flex-w flex-m m-r-20 m-tb-5">

                                <input class="stext-104 cl2 plh4 size-117 bor13 p-lr-20 m-r-10 m-tb-5" type="text"
                                    name="promocode" placeholder="PROMOCODE">

                                <div
                                    class="flex-c-m stext-101 cl2 size-118 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-5">
                                    <button id="promocode-btn" type="submit">Apply promocode</button>
                                </div>
                            </div>
                            <div class="" id="promo_error"></div>
                        @endif
                    </form>
                </div>


            </div>
        </div>


        <div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
            <div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
                <h4 class="mtext-109 cl2 p-b-30">
                    Cart Totals
                </h4>

                <div class="flex-w flex-t bor12 p-b-13">
                    <div class="size-208">
                        <span class="stext-110 cl2">
                            Subtotal:
                        </span>
                    </div>

                    <div class="size-209">
                        <span id="totalPrice1" class="mtext-110 cl2">
                            ${{ round($totalPrice, 2) }}
                        </span>
                    </div>
                </div>


                <form role="form" id="checkout" action="{{ route('order.store') }}" method="POST">

                    @csrf

                    <div class="p-t-15">

                        <div class="bor8 bg0 m-b-12 form-floating">

                            <input class="stext-111 cl8 plh3 size-111 p-lr-15 form-control"
                                value="{{ old('first_name') }}" type="text" name="first_name"
                                placeholder="First Name">
                            <label for="first_name">First Name:</label>
                        </div>
                        @error('first_name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror

                        <div class="bor8 bg0 m-b-12 form-floating">
                            <input class="stext-111 cl8 plh3 size-111 p-lr-15 form-control" type="text"
                                value="{{ old('last_name') }}" name="last_name" placeholder="Last Name">
                            <label for="last_name">Last Name:</label>
                        </div>
                        @error('last_name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror

                        <div class="bor8 bg0 m-b-12 form-floating">
                            <input class="stext-111 cl8 plh3 size-111 p-lr-15 form-control" type="text"
                                value="{{ old('phone_nb') }}" name="phone_nb" placeholder="Phone Number">
                            <label for="phone_nb">Phone Number:</label>
                        </div>
                        @error('phone_nb')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror

                        <div class="bor8 bg0 m-b-12 form-floating">
                            <input class="stext-111 cl8 plh3 size-111 p-lr-15 form-control" type="text"
                                value="{{ old('phone_nb2') }}" name="phone_nb2" placeholder="Phone Number 2">
                            <label for="phone_nb2">Second Phone Number:</label>
                        </div>
                        @error('phone_nb2')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror

                        <div class="bor8 bg0 m-b-12 form-floating">
                            <input class="stext-111 cl8 plh3 size-111 p-lr-15 form-control" type="text"
                                value="{{ old('email') }}" name="email" placeholder="Email">
                            <label for="email">Email:</label>
                        </div>
                        @error('email')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                        <label for="province">Select a province:</label>
                        <div class="rs1-select2 rs2-select2 bor8 bg0 m-b-12 m-t-9">

                            <select id="province" class="js-select2" name="province">
                                <option></option>
                                <option @selected(old('province') == 'Beirut')>Beirut</option>
                                <option @selected(old('province') == 'Mount Lebanon')>Mount Lebanon</option>
                                <option @selected(old('province') == 'North Lebanon')>North Lebanon</option>
                                <option @selected(old('province') == 'South Lebanon')>South Lebanon</option>
                                <option @selected(old('province') == 'Nabtieh')>Nabtieh</option>
                                <option @selected(old('province') == 'Bekaa')>Bekaa</option>
                            </select>
                            <div class="dropDownSelect2"></div>

                        </div>
                        @error('province')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                        <label for="district">Select a district:</label>
                        <div class="rs1-select2 rs2-select2 bor8 bg0 m-b-12 m-t-9">

                            <select id="district" class="js-select2" name="district">
                                <option></option>
                                <!-- Beirut -->
                                <option @selected(old('district') == 'Beirut')>Beirut</option>

                                <!-- Mount Lebanon -->
                                <option @selected(old('district') == 'Baabda')>Baabda</option>
                                <option @selected(old('district') == 'Aley')>Aley</option>
                                <option @selected(old('district') == 'Matn')>Matn</option>
                                <option @selected(old('district') == 'Keserwan')>Keserwan</option>
                                <option @selected(old('district') == 'Chouf')>Chouf</option>
                                <option @selected(old('district') == 'Jbeil')>Jbeil</option>

                                <!-- North Lebanon -->
                                <option @selected(old('district') == 'Tripoli')>Tripoli</option>
                                <option @selected(old('district') == 'Batroun')>Batroun</option>
                                <option @selected(old('district') == 'Bsharri')>Bsharri</option>
                                <option @selected(old('district') == 'Koura')>Koura</option>
                                <option @selected(old('district') == 'Zgharta')>Zgharta</option>
                                <option @selected(old('district') == 'Akkar')>Akkar</option>
                                <option @selected(old('district') == 'Miniyeh-Danniyeh')>Miniyeh-Danniyeh</option>

                                <!-- South Lebanon -->
                                <option @selected(old('district') == 'Sidon')>Sidon</option>
                                <option @selected(old('district') == 'Tyre')>Tyre</option>
                                <option @selected(old('district') == 'Jezzine')>Jezzine</option>

                                <!-- Nabatieh -->
                                <option @selected(old('district') == 'Nabatieh')>Nabatieh</option>
                                <option @selected(old('district') == 'Marjeyoun')>Marjeyoun</option>
                                <option @selected(old('district') == 'Bint Jbeil')>Bint Jbeil</option>
                                <option @selected(old('district') == 'Hasbaya')>Hasbaya</option>

                                <!-- Bekaa -->
                                <option @selected(old('district') == 'Zahle')>Zahle</option>
                                <option @selected(old('district') == 'Baalbek')>Baalbek</option>
                                <option @selected(old('district') == 'Hermel')>Hermel</option>
                                <option @selected(old('district') == 'Rachaya')>Rachaya</option>
                                <option @selected(old('district') == 'West Bekaa')>West Bekaa</option>
                            </select>
                            <div class="dropDownSelect2"></div>

                        </div>
                        @error('district')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror

                        <div class="bor8 bg0 m-b-12 form-floating">
                            <input class="stext-111 cl8 plh3 size-111 p-lr-15 form-control" type="text"
                                value="{{ old('city') }}" name="city" placeholder="City">
                            <label for="city">City:</label>
                        </div>
                        @error('city')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror

                        <div class="bor8 bg0 m-b-22 form-floating">
                            <input class="stext-111 cl8 plh3 size-111 p-lr-15 form-control" type="text"
                                value="{{ old('address') }}" name="address" placeholder="Address">
                            <label for="address">Address:</label>
                        </div>
                        @error('address')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror

                        <div class="bor8 bg0 m-b-22 form-floating">
                            <textarea class="stext-111 cl8 plh3 size-111 p-lr-15 form-control" name="address_description"
                                placeholder="Address Description">{{ old('address_description') }}</textarea>
                            <label for="address_description">Address Description:</label>
                        </div>
                        @error('address_description')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror


                        <input id="promo_code" type="hidden" name="promocode" value="">
                        <input id="total_amount" type="hidden" name="total_amount" value="{{ $totalPrice }}">

                    </div>


                    <div class="flex-w flex-t p-t-27 p-b-33">
                        <div class="size-208">
                            <span class="mtext-101 cl2">
                                Total:
                            </span>
                        </div>

                        <div class="size-209 p-t-1">
                            <span id="totalPrice2" class="mtext-110 cl2">
                                ${{ round($totalPrice, 2) }}
                            </span>
                        </div>
                    </div>
                    @if ($cart)
                        <button type="submit" form="checkout"
                            class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
                            Proceed to Checkout
                        </button>
                    @endif
                </form>
            </div>
        </div>
    </div>
</div>
{{-- </form>     --}}
{{-- <script src="{{asset ('pacex/vendor/jquery/jquery-3.2.1.min.js')}}"></script> --}}

<script>
  // Data for dependent dropdown
  const data = {
    "beirut": [
      { value: "achrafieh", text: "Achrafieh" },
      { value: "hamra", text: "Hamra" },
      { value: "saifi", text: "Saifi" }
    ],
    "mount-lebanon": [
      { value: "baabda", text: "Baabda" },
      { value: "jounieh", text: "Jounieh" },
      { value: "byblos", text: "Byblos" }
    ],
    "north-lebanon": [
      { value: "tripoli", text: "Tripoli" },
      { value: "batroun", text: "Batroun" },
      { value: "koura", text: "Koura" }
    ],
    "south-lebanon": [
      { value: "sidon", text: "Sidon" },
      { value: "tyre", text: "Tyre" },
      { value: "jezzine", text: "Jezzine" }
    ],
    "nabtieh": [
      { value: "nabatieh-city", text: "Nabatieh City" },
      { value: "kfar-roummane", text: "Kfar Roummane" },
      { value: "houla", text: "Houla" }
    ],
    "bekaa": [
      { value: "zahleh", text: "Zahleh" },
      { value: "baalbek", text: "Baalbek" },
      { value: "rashayya", text: "Rashayya" }
    ]
  };

  // Get references to the dropdowns
  const provinceDropdown = document.getElementById("province");
  const cityDropdown = document.getElementById("city");

  // Event listener for province change
  provinceDropdown.addEventListener("change", () => {
    const selectedProvince = provinceDropdown.value;

    // Clear the city dropdown
    cityDropdown.innerHTML = '<option value="">Select City</option>';

    // Populate the city dropdown if data exists for the selected province
    if (data[selectedProvince]) {
      data[selectedProvince].forEach(option => {
        const newOption = document.createElement("option");
        newOption.value = option.value;
        newOption.textContent = option.text;
        cityDropdown.appendChild(newOption);
      });
    }

    // Trigger Select2 update
    $(cityDropdown).trigger("change");
  });
</script>

<script>
    $(function() {
        $('[data-bs-toggle="tooltip"]').tooltip();
    });
</script>
<script>
    function deleteFromCart(productId) {
        event.preventDefault();

        let formData = {
            _token: document.querySelector('input[name="_token"]').value,
            id: productId,
            title: document.getElementById("title-size"+productId).innerText
        };

        $.ajax({
            url: '/delete-from-cart',
            method: 'POST',

            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: JSON.stringify(formData),
            contentType: 'application/json',
            success: function(response) {
                swal(formData['title'], "is removed from cart!", "error").then(() => {
                    // Reload the page when the user clicks "OK"
                    location.reload();
                });
            },
            error: function(xhr) {
                alert('Error removing item from cart');
            }
        });
    }
</script>


<script>
    function updateCart(id, size, quantity) {
        let itemData = {
            id: id,
            size: size,
            'num-product': quantity,
        };

        // Now handle adding this item to the cart (send to Laravel via AJAX or store in cookies)

        $.ajax({
            url: '/add-to-cart',
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: itemData,
            success: function(response) {
                swal("Your cart", "was UPDATED !", "success");

            },
            error: function(xhr) {
                alert('Error adding item to cart');
            }
        });
    }
</script>

@endsection

@section('JS-plus-minus')
<script>
    $(document).ready(function() {

        $('.btn-num-product-down1').on('click', function() {

            var numProduct = Number($(this).next().val());

            var productId = $(this).attr('productId');



            var size = $(this).attr('productSize');
            var price = $(this).attr('productPrice');
            var sizeId = $(this).attr('sizeId');

            if (numProduct == 1) {
                deleteFromCart(productId+sizeId);
            } else {
                updateCart(productId, size, -1);
            }


            if (numProduct > 0) $(this).next().val(numProduct - 1);
            var oldPrice = parseFloat($("#" + sizeId + productId).text().match(/[\d.]+/)[0]);
            var totalPrice = parseFloat($("#totalPrice1").text().match(/[\d.]+/)[0]);

            var newPriceElement=$("#newPrice1");
            if(newPriceElement.length!=0)
            {
                console.log(newPriceElement.length);
                var newPrice=parseFloat(newPriceElement.text().match(/[\d.]+/)[0]);
                if($('#promo_percentage').val()>0)
            {
                price=parseFloat(price)-parseFloat(price)*$('#promo_percentage').val()/100;
                console.log(price);
                
            }
                newPriceElement.text("$" + (newPrice - parseFloat(price)).toFixed(2));
                $("#newPrice2").text("$" + (newPrice - parseFloat(price)).toFixed(2));
            }

            $("#" + sizeId + productId).text("$ " + (oldPrice - parseFloat(price)).toFixed(2));
            $("#totalPrice1").text("$" + (totalPrice - parseFloat(price)).toFixed(2));
            $("#totalPrice2").text("$" + (totalPrice - parseFloat(price)).toFixed(2));
        });

        $('.btn-num-product-up1').on('click', function() {
            var numProduct = Number($(this).prev().val());

            var productId = $(this).attr('productId');
            var price = $(this).attr('productPrice');
            var sizeId = $(this).attr('sizeId');

            var size = $(this).attr('productSize');

            $(this).prev().val(numProduct + 1);
            updateCart(productId, size, 1);

            var oldPrice = parseFloat($("#" + sizeId + productId).text().match(/[\d.]+/)[0]);
            
            var totalPrice = parseFloat($("#totalPrice1").text().match(/[\d.]+/)[0]);

            var newPriceElement=$("#newPrice1");
            if(newPriceElement.length!=0)
            {
                console.log(newPriceElement.length);
                var newPrice=parseFloat(newPriceElement.text().match(/[\d.]+/)[0]);
                if($('#promo_percentage').val()>0)
            {
                price=parseFloat(price)-parseFloat(price)*$('#promo_percentage').val()/100;
                console.log(price);
                
            }
                newPriceElement.text("$" + (newPrice + parseFloat(price)).toFixed(2));
                $("#newPrice2").text("$" + (newPrice + parseFloat(price)).toFixed(2));
            }
            $("#" + sizeId + productId).text("$ " + (oldPrice + parseFloat(price)).toFixed(2));
            $("#totalPrice1").text("$" + (totalPrice + parseFloat(price)).toFixed(2));
            $("#totalPrice2").text("$" + (totalPrice + parseFloat(price)).toFixed(2));

        });
    });
</script>

<script>
    $(document).ready(function() {
        $('#promocode').submit(function(event) {
            event.preventDefault();

            const promocode = $('input[name="promocode"]').val();
            const csrfToken = $('input[name="_token"]').val(); // If CSRF protection is needed

            $.ajax({
                url: '/promocodeExists',
                method: 'GET',
                data: {
                    promocode: promocode,
                },
                headers: {
                    'X-CSRF-TOKEN': csrfToken // Include CSRF token if required
                },
                success: function(response) {
                    if (response.success) {
                        // Promocode found, display the details
                        //alert(`Promocode applied successfully! Code: ${response.promocode}, Discount: ${response.percentage}%`);
                        const oldPrice = $('#totalPrice1').addClass('text-decoration-line-through text-danger');
                        const oldPrice2 = $('#totalPrice2').addClass('text-decoration-line-through text-danger');
                        const price = parseFloat($("#totalPrice1").text().match(/[\d.]+/)[0]);
                        let newPrice;
                        if (response.value > 0) {
                            newPrice = price - response.value;
                            $('#promo_error').text("PROMOCODE Found and $" + response.value + " will be deducted from your bill").removeClass().addClass('text-success');

                        } else {
                            
                            newPrice = price - price * response.percentage / 100;
                            $('#promo_error').text("PROMOCODE Found and " + response.percentage + "% will be deducted from your bill").removeClass().addClass('text-success');
                        }

                        $('<input>').attr({
                                            type: 'hidden',  // Set the input type to hidden
                                            id: 'promo_percentage',  // Set the ID of the input
                                            value: response.percentage  // Set the value of the input
                                        }).appendTo('#promo_error'); // Append it to a specific element

                        const newPriceElement = $('<span>').text(' $' + newPrice.toFixed(2));
                        const newPriceElement2 = $('<span>').text(' $' + newPrice.toFixed(2));
                        newPriceElement.addClass('mtext-110 cl2 text-success').attr('id','newPrice1')
                        newPriceElement2.addClass('mtext-110 cl2 text-success').attr('id','newPrice2')
                        oldPrice.after(newPriceElement);
                        oldPrice2.after(newPriceElement2);
                        $('#promocode-btn').prop('disabled', true);
                        $('#total_amount').val(newPrice);
                        $('#promo_code').val(promocode);


                    } else {
                        // Handle unexpected success structure
                        alert('Unexpected error: ' + response.error);
                    }
                },
                error: function(xhr) {
                    // Handle error response
                    if (xhr.status === 404) {
                        $('#promo_error').text("PROMOCODE Not Found!!!").removeClass().addClass('text-danger');
                    } else {
                        $('#promo_error').text("Please Enter a PROMOCODE").removeClass().addClass('text-primary'); 
                    }
                }
            });
        });
    });
</script>

@endsection
