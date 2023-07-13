import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/js/app.js",
                "resources/css/app.css",
                "resources/css/header.css",
                "resources/css/footer.css",
                "resources/css/navigation.css",
                "resources/css/thankyou.css",
                "resources/js/miniCart.js",
                "resources/js/cart.js",
                "resources/css/cart.css",
                "resources/js/checkout.js",
                "resources/css/checkout.css",
                "resources/css/shippingFields.css",
                "resources/css/category.css",
                "resources/js/product.js",
                "resources/css/product.css",
                "resources/css/profile.css",
                "resources/js/register.js",
                "resources/css/register.css",
                "resources/js/login.js",
                "resources/css/login.css",
            ],
            refresh: true,
        }),
    ],
});
