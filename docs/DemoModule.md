# Demo Module
There is a Demo module built to understand the functionality of the project better. Demo module is stored at tests/testModule/Acme. You can cut paste this into app/code directory of magento to run it. (You need to have magento set up for this)
![Demo drawio](https://github.com/kirtii119/static-impact-analysis/assets/85681285/64ab37b5-03e1-4263-ace5-84b90b69850f)

![Demo.drawio.svg](https://prod-files-secure.s3.us-west-2.amazonaws.com/25a6bc0b-1c18-4d82-b275-0aaf39fe05f6/8f08002c-af64-44b2-b796-0470d4d61fbf/Demo.drawio.svg)

This is the structure of the module. Uncomment lines 20-22 in Acme/OrderModule/Model/Customer.php to make the code break. It affects 3 URLs where 1 remains the same, 1 is changed and 1 breaks. 1 URL remains unaffected. Look at the code and diagram above to figure out the reason. Pass the whole function name while running the project to see the magic happen. Make sure you have function calls mapping generated and controller-url mapping set.

These are controller-url mapping for this demo:

Acme\PaymentModule\Controller\Payment\Detail::execute=>paymentpage/payment/detail
Acme\OrderModule\Controller\Order\Detail::execute=>orderpage/order/detail
Acme\CartModule\Controller\Cart\Detail::execute=>cartpage/cart/detail
Acme\ProductModule\Controller\Product\Detail::execute=>productpage/product/detail
