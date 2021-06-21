<p align="center"><a href="http://icard.ly/index.html#" target="_blank"><img src="http://icardsysp1.azurewebsites.net/mresources/img/logo.png" style="background-color:#e83e8c;" width="200" ></a></p>

 

## iCard API Documentation

iCard is an online store for giftcards and vouchers of local brands in Libya as well as international brands and services. The main and only payment method on the iCard store is by using an iCash wallet.

In addition to the website, Android and iOS apps; the iCard store is also acessable via an API (Application Progeramming Interface).
## Base URL

    http://icardtestapp.azurewebsites.net

## Endpoint
 - [Get Brand](#get-brand)    
 - [Get Brand Details](#get-brand-details)
 - [Validate Card](#validate-card)     
 - [Purchase](#purchase)  
 - [Get Brand Logo](#get-brand-logo)  
 
 

Endpoint | Methods |
------------ | -------------| 
/api/icard/GetBrand| GET | 
/api/icard/BrandDetails| GET  
/api/icard/ValidateCard| GET  
/api/icard/Purchase| POST
/api/icard/brandlogo|GET  

## Get Brand 
   > [Base URL](#base-url) /api/icard/GetBrand
#### GetBrand Parameters 
 | Parameters | type | required 
------------ | -------------| -------------| 
 pack | string|not required |
 all | boolen | not required |

###### Request (GET)
 
This request requires the following  Json array:

    {
    "pack" : 712,
    "all" : "true"
    }
### Response

    [
    {
        "id": 1,
        "name": "ليبيانا للهاتف المحمول",
        "nameEn": "Libyana",
        "recharegeFormat": "*120*{0}#",
        "viewOnFastBuy": true,
        "image": "1.png",
        "rank": 0,
        "qrFormat": "{0}",
        "cats": [
            {
                "id": 12,
                "card_name": "ليبيانا 3",
                "cardNameEn": "3 LIBYANA",
                "card_price": 2.9400,
                "quentity": 10,
                "shortName": "ليبيانا 3",
                "shortNameEn": "Libyana 3",
                "currency": 0
            },
          ............................
        ]
    },
    .............

## Get Brand Details 
   >[Base URL](#base-url)  /api/icard/BrandDetails 
###### Request Parameters
 | Parameters | type | required 
------------ | -------------| -------------| 
 id | string|required |
###### Request (GET)
 This request requires the following  URL Parameters :
 >[Base URL](#base-url)  /api/icard/BrandDetails?id=13
###### Response
    {
    "id": 13,
    "name": "أيتونز ( أمريكا )",
    "nameEn": null,
    "recharegeFormat": null,
    "viewOnFastBuy": false,
    "shortDetails": "احصل على كافة التطبيقات، الملفات،والفيديوهات  المدفوعة الخاصة بنظام تشغيل ios",
    "longDetails": "لإضافة رصيد إلى Apple ID على iPhone أو iPad أو iPod touch\r\n1. افتح تطبيق App Store.\r\n2. اضغط على صورتك أو زر تسجيل الدخول أعلى الشاشة.\r\n3. اضغط على \"إضافة رصيد إلى Apple ID.\"\r\n4. اضغط على المبلغ الذي تريد إضافته، أو اضغط على \"غير ذلك\" لإدخال مبلغ آخر.\r\n5. انقر على \"التالي\"، ثم قم بتأكيد الاختيار.",
    "url": "https://www.apple.com/itunes/",
    "image": "13.png",
    "rank": 0
    }


## Validate Card 
  >[Base URL](#base-url)  /api/icard/ValidateCard
###### Request Parameters
 | Parameters | type | required 
------------ | -------------| -------------| 
 cardno | int|required |
 amount | int|required |
###### Request (GET)
This request requires the following json array: 

    {
    "cardno" : 7010100050,
    "amount" : 0
    }
 

###### Response

    {
    "ShopID": 10,
    "pack": 701,
    "qrImage": "",
    "time": "00:00:00.2031117",
    "Amount": 0,
    "QRString": "10,0.000"
    }


## Purchase 
 >[Base URL](#base-url)  /api/icard/Purchase

###### Request Parameters 
 | Parameters | type | required | Details
------------ | -------------| -------------| -------------| 
 items | array|required | List of iteam 
 confirmcode | int|required |Generate from Icash
 cardno | int|required | number iCash card

###### Request (POST)
###### headers
| Parameters | required |
------------ | -------------| 
 apitoken |required  
 ###### Body
This request requires the following Json array :

    {
    "items" :[   
                {
                     "id" : 12,"quantity"  : 1
                }
                .......
             ],
        "confirmcode":2381770,
         "cardno":1000104024 
    }

###### Response

    {
    "invoice_id": 1230010,
    "public_id": "BJF+2bkVfTgS/MYrQ908l2Fsqpc4dXCgLb+Y+rQvjhPwwKCA9/Zm8nXYZH1vtsCOsOYH+BDW0su+hpHbrxZ2Fw==",
    "cards": [
        {
            "brandId": 1,
            "catId": 13,
            "cid": 1296424,
            "card_brand": "ليبيانا للهاتف المحمول",
            "card_name": "ليبيانا 5",
            "card_price": 5,
            "sn": "992432224359111",
            "secret_num": "HYUN123IY678MD23",
            "expiry_date": "5/9/2022 12:00:00 AM",
            "tafaniId": null,
            "rechargeFormat": "*120*HYUN123IY678MD23#",
            "extra": null,
            "PrintingCount": 0,
            "currency": 0,
            "invoice": null
        }
        .................
    ],
    "date": "5/25/2021 11:20:46 AM"
    }

## Get Brand Logo 
>[Base URL](#base-url)  /api/icard/brandlogo

###### Request (GET)
This request requires the following url Parameters :
###### Request Parameters 
 | Parameters | type | required | Details
------------ | -------------| -------------| -------------| 
 id | int|required | Id brand
 

###### Response
Return Logo for brand.


## Error List
Response Error List :
| Code | explanation |
------------ | -------------| 
 3 |wrong Payment   
 -01 |Error Network   
 0 |Not Found   