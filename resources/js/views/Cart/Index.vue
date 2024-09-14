<script>
export default {
    name: "Index",

    data() {
        return {
            products: [],
        }
    },

    mounted() {
        $(document).trigger('init');
        this.getProducts();
    },

    methods: {
        getProducts(){
            this.products = JSON.parse(localStorage.getItem('cart'));
        },

        addQty(product){
            product.qty ++
            this.updateCart()
        },

        minusQty(product){
            if(product.qty == 0 ) return;
            product.qty --
            this.updateCart()
        },

        removeProduct(id){
            this.products = this.products.filter(product => {
                if (product.id != id) return product;
            })
            this.updateCart()
        },

        updateCart(){
            localStorage.setItem('cart', JSON.stringify(this.products))
        },
    }
}
</script>

<template>
    <main class="overflow-hidden ">
        <!--Start Breadcrumb Style2-->
        <section class="breadcrumb-area" style="background-image: url(/assets/images/inner-pages/breadcum-bg.png);">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="breadcrumb-content text-center wow fadeInUp animated">
                            <h2>Cart</h2>
                            <div class="breadcrumb-menu">
                                <ul>
                                    <li><a href="index.html"><i class="flaticon-home pe-2"></i>Home</a></li>
                                    <li> <i class="flaticon-next"></i> </li>
                                    <li class="active">Cart</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--End Breadcrumb Style2-->
        <!--Start cart area-->
        <section class="cart-area pt-120 pb-120">
            <div class="container">
                <div class="row wow fadeInUp animated">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <div class="cart-table-box">
                            <div class="table-outer">
                                <table class="cart-table">
                                    <thead class="cart-header">
                                    <tr>
                                        <th class="">Product Name</th>
                                        <th class="price">Price</th>
                                        <th>Quantity</th>
                                        <th>Subtotal</th>
                                        <th class="hide-me"></th>
                                    </tr>
                                    </thead>
                                    <tbody v-if="products">
                                    <tr  v-for="product in products">
                                        <td >
                                            <div class="thumb-box"> <a href="shop-details-1.html" class="thumb">
                                                <img :src="product.image_url" :alt="product.title">
                                            </a> <a href="shop-details-1.html" class="title">
                                                <h5>{{ product.title }}</h5>
                                            </a> </div>
                                        </td>
                                        <td>${{ product.price }}</td>
                                        <td class="qty">
                                            <div class="qtySelector text-center">
                                                <span @click="minusQty(product)" class="decreaseQty"><i
                                                    class="flaticon-minus"></i>
                                                </span> <input type="number" class="qtyValue" :value="product.qty" />
                                                <span @click="addQty(product)" class="increaseQty"> <i
                                                    class="flaticon-plus"></i> </span>
                                            </div>
                                        </td>
                                        <td class="sub-total">${{ product.qty * product.price }}</td>
                                        <td>
                                            <div @click="removeProduct(product.id)" class="remove"> <i class="flaticon-cross"></i> </div>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="cart-button-box">
                            <div class="apply-coupon wow fadeInUp animated">
                                <div class="apply-coupon-input-box mt-30 "> <input type="text" name="coupon-code"
                                                                                   value="" placeholder="Coupon Code"> </div>
                                <div class="apply-coupon-button mt-30"> <button class="btn--primary style2"
                                                                                type="submit">Apply Coupon</button> </div>
                            </div>
                            <div class="cart-button-box-right wow fadeInUp animated"> <button class="btn--primary mt-30"
                                                                                              type="submit">Continue Shopping</button> <button class="btn--primary mt-30"
                                                                                                                                               type="submit">Update Cart</button> </div>
                        </div>
                    </div>
                </div>
                <div class="row pt-120">
                    <div class="col-xl-6 col-lg-7 wow fadeInUp animated">
                        <div class="cart-total-box">
                            <div class="inner-title">
                                <h3>Cart Totals</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt--30">
                    <div class="col-xl-6 col-lg-7 wow fadeInUp animated">
                        <div class="cart-total-box mt-30">
                            <div class="table-outer">
                                <table class="cart-table2">
                                    <thead class="cart-header clearfix">
                                    <tr>
                                        <th colspan="1" class="shipping-title">Shipping</th>
                                        <th class="price">${{ products.reduce((accumulator, product) => {
                                            return accumulator + product.qty * product.price
                                        },0) }}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td class="shipping"> Shipping </td>
                                        <td class="selact-box1">
                                            <ul class="shop-select-option-box-1">
                                                <li> <input type="checkbox" name="free_shipping" id="option_1"
                                                            checked=""> <label for="option_1"><span></span>Free
                                                    Shipping</label> </li>
                                                <li> <input type="checkbox" name="flat_rate" id="option_2"> <label
                                                        for="option_2"><span></span>Flat Rate</label> </li>
                                                <li> <input type="checkbox" name="local_pickup" id="option_3">
                                                    <label for="option_3"><span></span>Local Pickup</label> </li>
                                            </ul>
                                            <div class="inner-text">
                                                <p>Shipping options will be updated during checkout</p>
                                            </div>
                                            <h4>Calculate Shipping</h4>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h4 class="total">Total</h4>
                                        </td>
                                        <td class="subtotal">${{ products.reduce((accumulator, product) => {
                                            return accumulator + product.qty * product.price
                                        },0) }}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-5 wow fadeInUp animated">
                        <div class="cart-check-out mt-30">
                            <h3>Check Out</h3>
                            <ul class="cart-check-out-list">
                                <li>
                                    <div class="left">
                                        <p>Subtotal</p>
                                    </div>
                                    <div class="right">
                                        <p>${{ products.reduce((accumulator, product) => {
                                            return accumulator + product.qty * product.price
                                        },0) }}</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="left">
                                        <p>Shipping</p>
                                    </div>
                                    <div class="right">
                                        <p><span>Flat rate:</span> $50.00</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="left">
                                        <p>Total Price:</p>
                                    </div>
                                    <div class="right">
                                        <p>$2550.00</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--End cart area-->
    </main>
</template>

<style scoped>

</style>
