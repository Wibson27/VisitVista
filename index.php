<?php
require_once __DIR__ . '/functions/database_functions.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Get top recommended places
$recommendations = getTopRecommendedPlaces();
$reviews = getAllReviews();
$places = getAllPlaces();
$articles = getLatestArticles();
// // Debug reviews distribution
// $debugQuery = "
//     SELECT
//         p.id,
//         p.name,
//         p.average_rating,
//         COUNT(r.id) as review_count
//     FROM places p
//     LEFT JOIN reviews r ON p.id = r.place_id
//     GROUP BY p.id, p.name, p.average_rating
// ";

// try {
//     $result = $db->query($debugQuery)->fetchAll(PDO::FETCH_ASSOC);
//     echo "<pre>Review distribution per place:\n";
//     foreach ($result as $row) {
//         echo "Place {$row['name']}: {$row['review_count']} reviews, Rating: {$row['average_rating']}\n";
//     }
//     echo "</pre>";
// } catch(Exception $e) {
//     echo $e->getMessage();
// }
// // Debug output
// echo "<pre>";
// echo "Number of recommendations found: " . count($recommendations) . "\n";
// if (empty($recommendations)) {
//     // Check if we have any places at all
//     $query = "SELECT COUNT(*) FROM places";
//     $result = $db->query($query)->fetchColumn();
//     echo "Total places in database: " . $result . "\n";

//     // Check if we have any reviews
//     $query = "SELECT COUNT(*) FROM reviews";
//     $result = $db->query($query)->fetchColumn();
//     echo "Total reviews in database: " . $result . "\n";
// }
// echo "</pre>";
?>

<!DOCTYPE html>
<html data-wf-page="66f00efc0ba3b86a13792a52" data-wf-site="66f00efc0ba3b86a13792a55" lang="en">

<head>
  <meta charset="utf-8" />
  <title>Home</title>
  <meta content="width=device-width, initial-scale=1" name="viewport" />
  <meta content="Webflow" name="generator" />
  <link href="css/agency-nx.webflow.6599087d1.min.css" rel="stylesheet" type="text/css" />
  <style>
    @media (min-width:992px) {
      html.w-mod-js:not(.w-mod-ix) [data-w-id="3aa175d3-aec0-87d4-b4df-998482ee7510"] {
        -webkit-transform: translate3d(0, 70%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);
        -moz-transform: translate3d(0, 70%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);
        -ms-transform: translate3d(0, 70%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);
        transform: translate3d(0, 70%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);
        opacity: 0;
      }
    }

    @media (max-width:991px) and (min-width:768px) {
      html.w-mod-js:not(.w-mod-ix) [data-w-id="3aa175d3-aec0-87d4-b4df-998482ee7510"] {
        -webkit-transform: translate3d(0, 70%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);
        -moz-transform: translate3d(0, 70%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);
        -ms-transform: translate3d(0, 70%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);
        transform: translate3d(0, 70%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);
        opacity: 0;
      }
    }

    @media (max-width:767px) and (min-width:480px) {
      html.w-mod-js:not(.w-mod-ix) [data-w-id="3aa175d3-aec0-87d4-b4df-998482ee7510"] {
        -webkit-transform: translate3d(0, 70%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);
        -moz-transform: translate3d(0, 70%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);
        -ms-transform: translate3d(0, 70%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);
        transform: translate3d(0, 70%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);
        opacity: 0;
      }
    }

    @media (max-width:479px) {
      html.w-mod-js:not(.w-mod-ix) [data-w-id="3aa175d3-aec0-87d4-b4df-998482ee7510"] {
        -webkit-transform: translate3d(0, 70%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);
        -moz-transform: translate3d(0, 70%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);
        -ms-transform: translate3d(0, 70%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);
        transform: translate3d(0, 70%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);
        opacity: 0;
      }
    }
  </style>
  <link href="https://fonts.googleapis.com" rel="preconnect" />
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin="anonymous" />
  <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js" type="text/javascript"></script>
  <script type="text/javascript">
    WebFont.load({
      google: {
        families: ["Oswald:200,300,400,500,600,700", "Inter:300,regular,500,600,700,800", "Material Icons:regular",
          "Material Icons Outlined:regular"
        ]
      }
    });
  </script>
  <script type="text/javascript">
    ! function (o, c) {
      var n = c.documentElement,
        t = " w-mod-";
      n.className += t + "js", ("ontouchstart" in o || o.DocumentTouch && c instanceof DocumentTouch) && (n.className +=
        t + "touch")
    }(window, document);
  </script>
  <link href="images/favicon.png" rel="shortcut icon" type="image/x-icon" />
  <link href="images/app-icon.png" rel="apple-touch-icon" />
  <style>
    body {
      -webkit-font-smoothing: antialiased;
      -moz-osx-font-smoothing: grayscale;
    }
  </style>
  <script type="text/javascript">
    window.__WEBFLOW_CURRENCY_SETTINGS = {
      "currencyCode": "USD",
      "symbol": "$",
      "decimal": ".",
      "fractionDigits": 2,
      "group": ",",
      "template": "{{wf {\"path\":\"symbol\",\"type\":\"PlainText\"} }} {{wf {\"path\":\"amount\",\"type\":\"CommercePrice\"} }} {{wf {\"path\":\"currencyCode\",\"type\":\"PlainText\"} }}",
      "hideDecimalForWholeNumbers": false
    };
  </script>
  <link href="css/style.css" rel="stylesheet" type="text/css" />
  <script type="text/javascript" src="js/script.js"></script>
</head>

<body>
  <div data-w-id="ea0483ae-d38f-61c7-1990-92beb1e755d2" class="site-wrapper">
    <div class="progress-bar">
      <div class="progress-bar-line"></div>
    </div>
    <!-- Custom Cursor -->
    <div class="cursor-mouse-wrapper">
      <div class="main-cursor">
        <div class="cursor-mouse-pointer">
          <div class="side-parts"></div>
          <div class="cursor-mouse"></div>
          <div class="side-parts"></div>
        </div>
        <div class="cursor-circle"></div>
      </div>
      <div class="main-cursor horizontal">
        <div class="arrow-part left"></div>
        <div class="arrow-part right"></div>
        <div class="main-part"></div>
      </div>
    </div>

    <!-- Navbar Wrapper -->
    <div class="navbar-hide-show-effect">
      <div data-w-id="9dabe443-61bf-363b-c654-3ce84672a380" class="navbar-hide"></div>
    </div>

    <!-- Navbar -->
    <div data-animation="over-left" class="navbar-rounded w-nav" data-easing2="ease" data-easing="ease-out-quart"
      data-collapse="medium" data-w-id="51e4b855-d29a-c7d2-d7af-78ea1dffdf68" role="banner" data-duration="1000"
      id="navbar">

      <!-- Navbar Container -->
      <div class="w-layout-blockcontainer container nav-container w-container">

        <!-- Navbar Main -->
        <div class="navbar-main">
          <!-- Logo -->
          <a data-w-id="ac2971f4-6f26-e7be-f7cd-a20c97325007" href="index.php" class="w-inline-block">
            <img src="images/logovisitvista.png" loading="lazy" alt="" class="site-logo" />
          </a>

          <!-- Navigation Menu -->
          <nav role="navigation" class="nav-menu-wrapper w-nav-menu">
            <div class="nav-menu-left-sidebar">
              <a href="index.php" data-w-id="783761a9-bb85-bb38-0e07-8475a4b307cb"class="nav-link-wrapper w-inline-block">
                <div class="nav-link">
                  <div class="default-text">Home</div>
                  <div class="default-text black-heading">Home</div>
                </div>
                <div class="absolute-hover-bottom"></div>
              </a>
              <a href="about-us.php" data-w-id="783761a9-bb85-bb38-0e07-8475a4b307cb"class="nav-link-wrapper w-inline-block">
                <div class="nav-link">
                  <div class="default-text">About</div>
                  <div class="default-text black-heading">About</div>
                </div>
                <div class="absolute-hover-bottom"></div>
              </a>
              <a href="explore.php" data-w-id="279a1d22-4f80-d177-04f5-58c1a704eb82" class="nav-link-wrapper w-inline-block">
                <div class="nav-link">
                  <div class="default-text">Explore</div>
                  <div class="default-text black-heading">Explore</div>
                </div>
                <div class="absolute-hover-bottom"></div>
              </a>
              <a href="article.php" data-w-id="aeb1c1fc-3038-8a62-2af0-a4afc7395963" class="nav-link-wrapper w-inline-block">
                <div class="nav-link">
                  <div class="default-text">Article</div>
                  <div class="default-text black-heading">Article</div>
                </div>
                <div class="absolute-hover-bottom"></div>
              </a>
            </div>
            <div class="close-navbar-icon w-nav-button">
              <div class="close-icon-rotate-white">close</div>
            </div>
          </nav>
          <div class="search-button-wrapper">
            <div class="pointer"><img data-w-id="108e4025-824f-59fd-ba99-015fe13c7bc7" loading="lazy" alt=""
                src="images/magnifying-glass.png" class="icon-svg-20-px" />
              <div class="search-popup">
                <div class="container">
                  <form action="/search" class="search-field-wrapper w-form"><input class="popup-search-input w-input"
                      maxlength="256" name="query" placeholder="Search…" type="search" id="search" required="" /><input
                      type="submit" class="search-button-absolute w-button" value="search" /></form>
                  <div data-w-id="108e4025-824f-59fd-ba99-015fe13c7bcd" class="close-icon-white">close</div>
                </div>
              </div>
            </div>
            <div data-open-product="" data-wf-cart-type="rightSidebar" data-wf-cart-query="query Dynamo2 {
  database {
    id
    commerceOrder {
      comment
      extraItems {
        name
        pluginId
        pluginName
        price {
          value
          unit
          decimalValue
          string
        }
      }
      id
      startedOn
      statusFlags {
        hasDownloads
        hasSubscription
        isFreeOrder
        requiresShipping
      }
      subtotal {
        value
        unit
        decimalValue
        string
      }
      total {
        value
        unit
        decimalValue
        string
      }
      updatedOn
      userItems {
        count
        id
        price {
          value
          unit
          decimalValue
          string
        }
        product {
          id
          cmsLocaleId
          f__draft_0ht
          f__archived_0ht
          f_ec_product_type_2dr10dr {
            id
            name
          }
          f_name_
          f_sku_properties_3dr {
            id
            name
            enum {
              id
              name
              slug
            }
          }
        }
        rowTotal {
          value
          unit
          decimalValue
          string
        }
        sku {
          cmsLocaleId
          f__draft_0ht
          f__archived_0ht
          f_main_image_4dr {
            url
            file {
              size
              origFileName
              createdOn
              updatedOn
              mimeType
              width
              height
              variants {
                origFileName
                quality
                height
                width
                s3Url
                error
                size
              }
            }
            alt
          }
          f_sku_values_3dr {
            property {
              id
            }
            value {
              id
            }
          }
          id
        }
        subscriptionFrequency
        subscriptionInterval
        subscriptionTrial
      }
      userItemsCount
    }
  }
  site {
    id
    commerce {
      businessAddress {
        country
      }
      defaultCountry
      defaultCurrency
      quickCheckoutEnabled
    }
  }
}" data-wf-page-link-href-prefix="" class="w-commerce-commercecartwrapper pointer"
              data-node-type="commerce-cart-wrapper"><a
                class="w-commerce-commercecartopenlink cart-button w-inline-block" role="button" aria-haspopup="dialog"
                aria-label="Open cart" data-node-type="commerce-cart-open-link" href="#"><img src="images/cart.png"
                  loading="lazy" alt="" class="icon-svg-20-px" />
                <div
                  data-wf-bindings="%5B%7B%22innerHTML%22%3A%7B%22type%22%3A%22Number%22%2C%22filter%22%3A%7B%22type%22%3A%22numberPrecision%22%2C%22params%22%3A%5B%220%22%2C%22numberPrecision%22%5D%7D%2C%22dataPath%22%3A%22database.commerceOrder.userItemsCount%22%7D%7D%5D"
                  class="w-commerce-commercecartopenlinkcount cart-quantity">0</div>
              </a>
              <div style="display:none"
                class="w-commerce-commercecartcontainerwrapper w-commerce-commercecartcontainerwrapper--cartType-rightSidebar"
                data-node-type="commerce-cart-container-wrapper">
                <div data-node-type="commerce-cart-container" role="dialog"
                  class="w-commerce-commercecartcontainer cart-container">
                  <div class="w-commerce-commercecartheader cart-header">
                    <h4 class="w-commerce-commercecartheading _24px-text">Your Cart</h4><a
                      class="w-commerce-commercecartcloselink close-button w-inline-block" role="button"
                      aria-label="Close cart" data-node-type="commerce-cart-close-link">
                      <div class="close-icon-white-static">close</div>
                    </a>
                  </div>
                  <div class="w-commerce-commercecartformwrapper">
                    <form style="display:none" class="w-commerce-commercecartform" data-node-type="commerce-cart-form">
                      <script type="text/x-wf-template"
                        id="wf-template-c3bc403f-e038-7da7-8235-50266ba9683f">%3Cdiv%20class%3D%22w-commerce-commercecartitem%20no-padding%22%3E%3Cdiv%20class%3D%22cart-item-wrapper%22%3E%3Cdiv%20class%3D%22mask-10px-rounded%22%3E%3Cimg%20data-wf-bindings%3D%22%255B%257B%2522src%2522%253A%257B%2522type%2522%253A%2522ImageRef%2522%252C%2522filter%2522%253A%257B%2522type%2522%253A%2522identity%2522%252C%2522params%2522%253A%255B%255D%257D%252C%2522dataPath%2522%253A%2522database.commerceOrder.userItems%255B%255D.sku.f_main_image_4dr%2522%257D%257D%255D%22%20src%3D%22%22%20alt%3D%22%22%20class%3D%22w-commerce-commercecartitemimage%20cart-thumbnail%20w-dyn-bind-empty%22%2F%3E%3C%2Fdiv%3E%3Cdiv%20class%3D%22w-commerce-commercecartiteminfo%20cart-info-wrapper%22%3E%3Cdiv%20data-wf-bindings%3D%22%255B%257B%2522innerHTML%2522%253A%257B%2522type%2522%253A%2522PlainText%2522%252C%2522filter%2522%253A%257B%2522type%2522%253A%2522identity%2522%252C%2522params%2522%253A%255B%255D%257D%252C%2522dataPath%2522%253A%2522database.commerceOrder.userItems%255B%255D.product.f_name_%2522%257D%257D%255D%22%20class%3D%22w-commerce-commercecartproductname%20_24px-text%20w-dyn-bind-empty%22%3E%3C%2Fdiv%3E%3Cp%20data-wf-bindings%3D%22%255B%257B%2522innerHTML%2522%253A%257B%2522type%2522%253A%2522CommercePrice%2522%252C%2522filter%2522%253A%257B%2522type%2522%253A%2522price%2522%252C%2522params%2522%253A%255B%255D%257D%252C%2522dataPath%2522%253A%2522database.commerceOrder.userItems%255B%255D.price%2522%257D%257D%255D%22%20class%3D%22_14px-text-500%22%3E%24%C2%A00.00%C2%A0USD%3C%2Fp%3E%3Cscript%20type%3D%22text%2Fx-wf-template%22%20id%3D%22wf-template-c3bc403f-e038-7da7-8235-50266ba96845%22%3E%253Cli%253E%253Cspan%2520data-wf-bindings%253D%2522%25255B%25257B%252522innerHTML%252522%25253A%25257B%252522type%252522%25253A%252522PlainText%252522%25252C%252522filter%252522%25253A%25257B%252522type%252522%25253A%252522identity%252522%25252C%252522params%252522%25253A%25255B%25255D%25257D%25252C%252522dataPath%252522%25253A%252522database.commerceOrder.userItems%25255B%25255D.product.f_sku_properties_3dr%25255B%25255D.name%252522%25257D%25257D%25255D%2522%2520class%253D%2522w-dyn-bind-empty%2522%253E%253C%252Fspan%253E%253Cspan%253E%253A%2520%253C%252Fspan%253E%253Cspan%2520data-wf-bindings%253D%2522%25255B%25257B%252522innerHTML%252522%25253A%25257B%252522type%252522%25253A%252522CommercePropValues%252522%25252C%252522filter%252522%25253A%25257B%252522type%252522%25253A%252522identity%252522%25252C%252522params%252522%25253A%25255B%25255D%25257D%25252C%252522dataPath%252522%25253A%252522database.commerceOrder.userItems%25255B%25255D.product.f_sku_properties_3dr%25255B%25255D%252522%25257D%25257D%25255D%2522%2520class%253D%2522w-dyn-bind-empty%2522%253E%253C%252Fspan%253E%253C%252Fli%253E%3C%2Fscript%3E%3Cul%20data-wf-bindings%3D%22%255B%257B%2522optionSets%2522%253A%257B%2522type%2522%253A%2522CommercePropTable%2522%252C%2522filter%2522%253A%257B%2522type%2522%253A%2522identity%2522%252C%2522params%2522%253A%255B%255D%257D%252C%2522dataPath%2522%253A%2522database.commerceOrder.userItems%255B%255D.product.f_sku_properties_3dr%5B%5D%2522%257D%257D%252C%257B%2522optionValues%2522%253A%257B%2522type%2522%253A%2522CommercePropValues%2522%252C%2522filter%2522%253A%257B%2522type%2522%253A%2522identity%2522%252C%2522params%2522%253A%255B%255D%257D%252C%2522dataPath%2522%253A%2522database.commerceOrder.userItems%255B%255D.sku.f_sku_values_3dr%2522%257D%257D%255D%22%20class%3D%22w-commerce-commercecartoptionlist%22%20data-wf-collection%3D%22database.commerceOrder.userItems%255B%255D.product.f_sku_properties_3dr%22%20data-wf-template-id%3D%22wf-template-c3bc403f-e038-7da7-8235-50266ba96845%22%3E%3Cli%3E%3Cspan%20data-wf-bindings%3D%22%255B%257B%2522innerHTML%2522%253A%257B%2522type%2522%253A%2522PlainText%2522%252C%2522filter%2522%253A%257B%2522type%2522%253A%2522identity%2522%252C%2522params%2522%253A%255B%255D%257D%252C%2522dataPath%2522%253A%2522database.commerceOrder.userItems%255B%255D.product.f_sku_properties_3dr%255B%255D.name%2522%257D%257D%255D%22%20class%3D%22w-dyn-bind-empty%22%3E%3C%2Fspan%3E%3Cspan%3E%3A%20%3C%2Fspan%3E%3Cspan%20data-wf-bindings%3D%22%255B%257B%2522innerHTML%2522%253A%257B%2522type%2522%253A%2522CommercePropValues%2522%252C%2522filter%2522%253A%257B%2522type%2522%253A%2522identity%2522%252C%2522params%2522%253A%255B%255D%257D%252C%2522dataPath%2522%253A%2522database.commerceOrder.userItems%255B%255D.product.f_sku_properties_3dr%255B%255D%2522%257D%257D%255D%22%20class%3D%22w-dyn-bind-empty%22%3E%3C%2Fspan%3E%3C%2Fli%3E%3C%2Ful%3E%3C%2Fdiv%3E%3Cdiv%20class%3D%22cart-qty-remove-icon-wrapper%22%3E%3Cinput%20aria-label%3D%22Update%20quantity%22%20data-wf-bindings%3D%22%255B%257B%2522value%2522%253A%257B%2522type%2522%253A%2522Number%2522%252C%2522filter%2522%253A%257B%2522type%2522%253A%2522numberPrecision%2522%252C%2522params%2522%253A%255B%25220%2522%252C%2522numberPrecision%2522%255D%257D%252C%2522dataPath%2522%253A%2522database.commerceOrder.userItems%255B%255D.count%2522%257D%257D%252C%257B%2522data-commerce-sku-id%2522%253A%257B%2522type%2522%253A%2522ItemRef%2522%252C%2522filter%2522%253A%257B%2522type%2522%253A%2522identity%2522%252C%2522params%2522%253A%255B%255D%257D%252C%2522dataPath%2522%253A%2522database.commerceOrder.userItems%255B%255D.sku.id%2522%257D%257D%255D%22%20data-wf-conditions%3D%22%257B%2522condition%2522%253A%257B%2522fields%2522%253A%257B%2522product%253Aec-product-type%2522%253A%257B%2522ne%2522%253A%2522e348fd487d0102946c9179d2a94bb613%2522%252C%2522type%2522%253A%2522Option%2522%257D%257D%257D%252C%2522dataPath%2522%253A%2522database.commerceOrder.userItems%255B%255D%2522%257D%22%20class%3D%22w-commerce-commercecartquantity%20cart-quantity-border%22%20required%3D%22%22%20pattern%3D%22%5E%5B0-9%5D%2B%24%22%20inputMode%3D%22numeric%22%20type%3D%22number%22%20name%3D%22quantity%22%20autoComplete%3D%22off%22%20data-wf-cart-action%3D%22update-item-quantity%22%20data-commerce-sku-id%3D%22%22%20value%3D%221%22%2F%3E%3Ca%20href%3D%22%23%22%20role%3D%22button%22%20data-wf-bindings%3D%22%255B%257B%2522data-commerce-sku-id%2522%253A%257B%2522type%2522%253A%2522ItemRef%2522%252C%2522filter%2522%253A%257B%2522type%2522%253A%2522identity%2522%252C%2522params%2522%253A%255B%255D%257D%252C%2522dataPath%2522%253A%2522database.commerceOrder.userItems%255B%255D.sku.id%2522%257D%257D%255D%22%20class%3D%22remove-item%20w-inline-block%22%20data-wf-cart-action%3D%22remove-item%22%20data-commerce-sku-id%3D%22%22%20aria-label%3D%22Remove%20item%20from%20cart%22%3E%3Cdiv%20class%3D%22remove-button-icon-cart%22%3Edelete%3C%2Fdiv%3E%3C%2Fa%3E%3C%2Fdiv%3E%3C%2Fdiv%3E%3C%2Fdiv%3E</script>
                      <div class="w-commerce-commercecartlist cart-list"
                        data-wf-collection="database.commerceOrder.userItems"
                        data-wf-template-id="wf-template-c3bc403f-e038-7da7-8235-50266ba9683f">
                        <div class="w-commerce-commercecartitem no-padding">
                          <div class="cart-item-wrapper">
                            <div class="mask-10px-rounded"><img
                                data-wf-bindings="%5B%7B%22src%22%3A%7B%22type%22%3A%22ImageRef%22%2C%22filter%22%3A%7B%22type%22%3A%22identity%22%2C%22params%22%3A%5B%5D%7D%2C%22dataPath%22%3A%22database.commerceOrder.userItems%5B%5D.sku.f_main_image_4dr%22%7D%7D%5D"
                                src="" alt=""
                                class="w-commerce-commercecartitemimage cart-thumbnail w-dyn-bind-empty" /></div>
                            <div class="w-commerce-commercecartiteminfo cart-info-wrapper">
                              <div
                                data-wf-bindings="%5B%7B%22innerHTML%22%3A%7B%22type%22%3A%22PlainText%22%2C%22filter%22%3A%7B%22type%22%3A%22identity%22%2C%22params%22%3A%5B%5D%7D%2C%22dataPath%22%3A%22database.commerceOrder.userItems%5B%5D.product.f_name_%22%7D%7D%5D"
                                class="w-commerce-commercecartproductname _24px-text w-dyn-bind-empty"></div>
                              <p data-wf-bindings="%5B%7B%22innerHTML%22%3A%7B%22type%22%3A%22CommercePrice%22%2C%22filter%22%3A%7B%22type%22%3A%22price%22%2C%22params%22%3A%5B%5D%7D%2C%22dataPath%22%3A%22database.commerceOrder.userItems%5B%5D.price%22%7D%7D%5D"
                                class="_14px-text-500">$ 0.00 USD</p>
                              <script type="text/x-wf-template"
                                id="wf-template-c3bc403f-e038-7da7-8235-50266ba96845">%3Cli%3E%3Cspan%20data-wf-bindings%3D%22%255B%257B%2522innerHTML%2522%253A%257B%2522type%2522%253A%2522PlainText%2522%252C%2522filter%2522%253A%257B%2522type%2522%253A%2522identity%2522%252C%2522params%2522%253A%255B%255D%257D%252C%2522dataPath%2522%253A%2522database.commerceOrder.userItems%255B%255D.product.f_sku_properties_3dr%255B%255D.name%2522%257D%257D%255D%22%20class%3D%22w-dyn-bind-empty%22%3E%3C%2Fspan%3E%3Cspan%3E%3A%20%3C%2Fspan%3E%3Cspan%20data-wf-bindings%3D%22%255B%257B%2522innerHTML%2522%253A%257B%2522type%2522%253A%2522CommercePropValues%2522%252C%2522filter%2522%253A%257B%2522type%2522%253A%2522identity%2522%252C%2522params%2522%253A%255B%255D%257D%252C%2522dataPath%2522%253A%2522database.commerceOrder.userItems%255B%255D.product.f_sku_properties_3dr%255B%255D%2522%257D%257D%255D%22%20class%3D%22w-dyn-bind-empty%22%3E%3C%2Fspan%3E%3C%2Fli%3E</script>
                              <ul
                                data-wf-bindings="%5B%7B%22optionSets%22%3A%7B%22type%22%3A%22CommercePropTable%22%2C%22filter%22%3A%7B%22type%22%3A%22identity%22%2C%22params%22%3A%5B%5D%7D%2C%22dataPath%22%3A%22database.commerceOrder.userItems%5B%5D.product.f_sku_properties_3dr[]%22%7D%7D%2C%7B%22optionValues%22%3A%7B%22type%22%3A%22CommercePropValues%22%2C%22filter%22%3A%7B%22type%22%3A%22identity%22%2C%22params%22%3A%5B%5D%7D%2C%22dataPath%22%3A%22database.commerceOrder.userItems%5B%5D.sku.f_sku_values_3dr%22%7D%7D%5D"
                                class="w-commerce-commercecartoptionlist"
                                data-wf-collection="database.commerceOrder.userItems%5B%5D.product.f_sku_properties_3dr"
                                data-wf-template-id="wf-template-c3bc403f-e038-7da7-8235-50266ba96845">
                                <li><span
                                    data-wf-bindings="%5B%7B%22innerHTML%22%3A%7B%22type%22%3A%22PlainText%22%2C%22filter%22%3A%7B%22type%22%3A%22identity%22%2C%22params%22%3A%5B%5D%7D%2C%22dataPath%22%3A%22database.commerceOrder.userItems%5B%5D.product.f_sku_properties_3dr%5B%5D.name%22%7D%7D%5D"
                                    class="w-dyn-bind-empty"></span><span>: </span><span
                                    data-wf-bindings="%5B%7B%22innerHTML%22%3A%7B%22type%22%3A%22CommercePropValues%22%2C%22filter%22%3A%7B%22type%22%3A%22identity%22%2C%22params%22%3A%5B%5D%7D%2C%22dataPath%22%3A%22database.commerceOrder.userItems%5B%5D.product.f_sku_properties_3dr%5B%5D%22%7D%7D%5D"
                                    class="w-dyn-bind-empty"></span></li>
                              </ul>
                            </div>
                            <div class="cart-qty-remove-icon-wrapper"><input aria-label="Update quantity"
                                data-wf-bindings="%5B%7B%22value%22%3A%7B%22type%22%3A%22Number%22%2C%22filter%22%3A%7B%22type%22%3A%22numberPrecision%22%2C%22params%22%3A%5B%220%22%2C%22numberPrecision%22%5D%7D%2C%22dataPath%22%3A%22database.commerceOrder.userItems%5B%5D.count%22%7D%7D%2C%7B%22data-commerce-sku-id%22%3A%7B%22type%22%3A%22ItemRef%22%2C%22filter%22%3A%7B%22type%22%3A%22identity%22%2C%22params%22%3A%5B%5D%7D%2C%22dataPath%22%3A%22database.commerceOrder.userItems%5B%5D.sku.id%22%7D%7D%5D"
                                data-wf-conditions="%7B%22condition%22%3A%7B%22fields%22%3A%7B%22product%3Aec-product-type%22%3A%7B%22ne%22%3A%22e348fd487d0102946c9179d2a94bb613%22%2C%22type%22%3A%22Option%22%7D%7D%7D%2C%22dataPath%22%3A%22database.commerceOrder.userItems%5B%5D%22%7D"
                                class="w-commerce-commercecartquantity cart-quantity-border" required=""
                                pattern="^[0-9]+$" inputMode="numeric" type="number" name="quantity" autoComplete="off"
                                data-wf-cart-action="update-item-quantity" data-commerce-sku-id="" value="1" /><a
                                href="#" role="button"
                                data-wf-bindings="%5B%7B%22data-commerce-sku-id%22%3A%7B%22type%22%3A%22ItemRef%22%2C%22filter%22%3A%7B%22type%22%3A%22identity%22%2C%22params%22%3A%5B%5D%7D%2C%22dataPath%22%3A%22database.commerceOrder.userItems%5B%5D.sku.id%22%7D%7D%5D"
                                class="remove-item w-inline-block" data-wf-cart-action="remove-item"
                                data-commerce-sku-id="" aria-label="Remove item from cart">
                                <div class="remove-button-icon-cart">delete</div>
                              </a></div>
                          </div>
                        </div>
                      </div>
                      <div class="w-commerce-commercecartfooter">
                        <div aria-atomic="true" aria-live="polite" class="w-commerce-commercecartlineitem">
                          <div class="sub-total-text">Subtotal</div>
                          <div
                            data-wf-bindings="%5B%7B%22innerHTML%22%3A%7B%22type%22%3A%22CommercePrice%22%2C%22filter%22%3A%7B%22type%22%3A%22price%22%2C%22params%22%3A%5B%5D%7D%2C%22dataPath%22%3A%22database.commerceOrder.subtotal%22%7D%7D%5D"
                            class="w-commerce-commercecartordervalue sub-total-text"></div>
                        </div>
                        <div>
                          <div data-node-type="commerce-cart-quick-checkout-actions" style="display:none"
                            class="web-payments-button-wrapper"><a data-node-type="commerce-cart-apple-pay-button"
                              role="button" aria-label="Apple Pay" aria-haspopup="dialog"
                              style="background-image:-webkit-named-image(apple-pay-logo-white);background-size:100% 50%;background-position:50% 50%;background-repeat:no-repeat"
                              class="w-commerce-commercecartapplepaybutton apple-pay-button _60px" tabindex="0">
                              <div></div>
                            </a><a data-node-type="commerce-cart-quick-checkout-button" role="button" tabindex="0"
                              aria-haspopup="dialog" style="display:none"
                              class="w-commerce-commercecartquickcheckoutbutton apple-pay-button _60px"><svg
                                class="w-commerce-commercequickcheckoutgoogleicon" xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink" width="16" height="16" viewBox="0 0 16 16">
                                <defs>
                                  <polygon id="google-mark-a" points="0 .329 3.494 .329 3.494 7.649 0 7.649"></polygon>
                                  <polygon id="google-mark-c" points=".894 0 13.169 0 13.169 6.443 .894 6.443">
                                  </polygon>
                                </defs>
                                <g fill="none" fill-rule="evenodd">
                                  <path fill="#4285F4"
                                    d="M10.5967,12.0469 L10.5967,14.0649 L13.1167,14.0649 C14.6047,12.6759 15.4577,10.6209 15.4577,8.1779 C15.4577,7.6339 15.4137,7.0889 15.3257,6.5559 L7.8887,6.5559 L7.8887,9.6329 L12.1507,9.6329 C11.9767,10.6119 11.4147,11.4899 10.5967,12.0469">
                                  </path>
                                  <path fill="#34A853"
                                    d="M7.8887,16 C10.0137,16 11.8107,15.289 13.1147,14.067 C13.1147,14.066 13.1157,14.065 13.1167,14.064 L10.5967,12.047 C10.5877,12.053 10.5807,12.061 10.5727,12.067 C9.8607,12.556 8.9507,12.833 7.8887,12.833 C5.8577,12.833 4.1387,11.457 3.4937,9.605 L0.8747,9.605 L0.8747,11.648 C2.2197,14.319 4.9287,16 7.8887,16">
                                  </path>
                                  <g transform="translate(0 4)">
                                    <mask id="google-mark-b" fill="#fff">
                                      <use xlink:href="#google-mark-a"></use>
                                    </mask>
                                    <path fill="#FBBC04"
                                      d="M3.4639,5.5337 C3.1369,4.5477 3.1359,3.4727 3.4609,2.4757 L3.4639,2.4777 C3.4679,2.4657 3.4749,2.4547 3.4789,2.4427 L3.4939,0.3287 L0.8939,0.3287 C0.8799,0.3577 0.8599,0.3827 0.8459,0.4117 C-0.2821,2.6667 -0.2821,5.3337 0.8459,7.5887 L0.8459,7.5997 C0.8549,7.6167 0.8659,7.6317 0.8749,7.6487 L3.4939,5.6057 C3.4849,5.5807 3.4729,5.5587 3.4639,5.5337"
                                      mask="url(#google-mark-b)"></path>
                                  </g>
                                  <mask id="google-mark-d" fill="#fff">
                                    <use xlink:href="#google-mark-c"></use>
                                  </mask>
                                  <path fill="#EA4335"
                                    d="M0.894,4.3291 L3.478,6.4431 C4.113,4.5611 5.843,3.1671 7.889,3.1671 C9.018,3.1451 10.102,3.5781 10.912,4.3671 L13.169,2.0781 C11.733,0.7231 9.85,-0.0219 7.889,0.0001 C4.941,0.0001 2.245,1.6791 0.894,4.3291"
                                    mask="url(#google-mark-d)"></path>
                                </g>
                              </svg><svg class="w-commerce-commercequickcheckoutmicrosofticon"
                                xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
                                <g fill="none" fill-rule="evenodd">
                                  <polygon fill="#F05022" points="7 7 1 7 1 1 7 1"></polygon>
                                  <polygon fill="#7DB902" points="15 7 9 7 9 1 15 1"></polygon>
                                  <polygon fill="#00A4EE" points="7 15 1 15 1 9 7 9"></polygon>
                                  <polygon fill="#FFB700" points="15 15 9 15 9 9 15 9"></polygon>
                                </g>
                              </svg>
                              <div>Pay with browser.</div>
                            </a></div>
                          <div class="primary-button user-button"><a href="/checkout" value="Continue to Checkout"
                              class="w-commerce-commercecartcheckoutbutton custom-button black"
                              data-loading-text="Hang Tight..." data-node-type="cart-checkout-button">Continue to
                              Checkout</a>
                            <div class="absolute-hover-bottom"></div>
                          </div>
                        </div>
                      </div>
                    </form>
                    <div class="w-commerce-commercecartemptystate">
                      <div aria-label="This cart is empty" aria-live="polite">No items found.</div>
                    </div>
                    <div aria-live="assertive" style="display:none" data-node-type="commerce-cart-error"
                      class="w-commerce-commercecarterrorstate">
                      <div class="w-cart-error-msg"
                        data-w-cart-quantity-error="Product is not available in this quantity."
                        data-w-cart-general-error="Something went wrong when adding this item to the cart."
                        data-w-cart-checkout-error="Checkout is disabled on this site."
                        data-w-cart-cart_order_min-error="The order minimum was not met. Add more items to your cart to continue."
                        data-w-cart-subscription_error-error="Before you purchase, please use your email invite to verify your address so we can send order updates.">
                        Product is not available in this quantity.</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="pointer">
              <a href="register.php" class="log-button" data-wf-user-logout="logout" data-wf-user-login="login" type="button">login</a>
            </div>
            <div data-w-id="c83eb7d7-4575-cda2-4005-1e693e785387" class="hamburger-menu w-nav-button">
              <div class="bars">
                <div class="bar-wrapper">
                  <div class="hamburger-line _1"></div>
                  <div class="_5px-hover-style _1"></div>
                </div>
                <div class="bar-wrapper">
                  <div class="hamburger-line _2"></div>
                  <div class="_5px-hover-style _2"></div>
                </div>
                <div class="bar-wrapper">
                  <div class="hamburger-line _3"></div>
                  <div class="_5px-hover-style _3"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="navbar-hide-show-effect">
      <div data-w-id="9dabe443-61bf-363b-c654-3ce84672a380" class="navbar-hide"></div>
    </div>
    <header
      data-poster-url="images/66f00efc0ba3b86a13792a55-2f66f5a5ceb1d778a4b77b35f7_1112875_teamwork_coworking_1920x1080-poster-00001.jpg"
      data-video-urls="images/index_video.mp4,images/index_video.mp4"
      data-autoplay="true" data-loop="true" data-wf-ignore="true" data-w-id="05fb9eaf-e923-5288-7ffa-b827944f5e75"
      class="hero-section w-background-video w-background-video-atom"><video
        id="05fb9eaf-e923-5288-7ffa-b827944f5e75-video" autoplay="" loop=""
        style="background-image:url(&quot;images/66f00efc0ba3b86a13792a55-2f66f5a5ceb1d778a4b77b35f7_1112875_teamwork_coworking_1920x1080-poster-00001.jpg&quot;)"
        muted="" playsinline="" data-wf-ignore="true" data-object-fit="cover">
        <source
          src="images/index_video.mp4"
          data-wf-ignore="true" />
        <source
          src="images/index_video.mp4"
          data-wf-ignore="true" /></video>
      <div class="container"><img width="1168.5" loading="eager" alt="Hero Image" src="images/hero-20bg.avif"
          class="hero-bg-image" />
        <div class="hero-block">
          <div class="title">
            <div class="title-divider">
              <div class="primary-title-divider-loop"></div>
            </div>
            <div data-w-id="5b919fa1-84ae-d7b6-0ea1-41df149cc60e" class="_10px-diamond"></div>
            <div>Tourism Services</div>
          </div>
          <div class="hero-title-block">
            <h1 class="hero-heading-17cqw">DISCOVER</h1>
            <h1 class="hero-heading-17cqw stroked">YOGYAKARTA'S</h1>
            <h1 class="hero-heading-17cqw">WONDERS</h1>
          </div>

          <div class="circle-hero"></div>
          <div class="circle-left-top"></div>
          <div
            style="display:block;-webkit-transform:translate3d(-2vw, -40vh, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(-2vw, -40vh, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(-2vw, -40vh, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(-2vw, -40vh, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0)"
            class="circle-small-3"></div>
          <div
            style="display:block;-webkit-transform:translate3d(-20vw, 0px, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(-20vw, 0px, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(-20vw, 0px, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(-20vw, 0px, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0)"
            class="circle-small-2"></div>
          <div
            style="-webkit-transform:translate3d(50vw, -50vh, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(50vw, -50vh, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(50vw, -50vh, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(50vw, -50vh, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);display:block"
            class="circle-small"></div><img
            style="-webkit-transform:translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(null) rotateZ(0deg) skew(0, 0);-moz-transform:translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(null) rotateZ(0deg) skew(0, 0);-ms-transform:translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(null) rotateZ(0deg) skew(0, 0);transform:translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(null) rotateZ(0deg) skew(0, 0);transform-style:preserve-3d"
            data-w-id="3c75e8ae-7118-cb65-e066-29742177ca0d" alt="" src="images/star-20-1-.avif" loading="lazy"
            class="_60px-star-loop" />
        </div>
      </div>
      <div data-w-id="86948c09-9ea6-0d24-c71d-cfb6b9e521b5" class="image-show-style">
        <div class="bg-column-mask">
          <div class="bg-color-column"></div>
          <div class="primary-color-column"></div>
        </div>
        <div id="w-node-_86948c09-9ea6-0d24-c71d-cfb6b9e521b9-b9e521b5" class="bg-column-mask">
          <div class="bg-color-column"></div>
          <div class="primary-color-column"></div>
        </div>
        <div id="w-node-_86948c09-9ea6-0d24-c71d-cfb6b9e521bc-b9e521b5" class="bg-column-mask">
          <div class="bg-color-column"></div>
          <div class="primary-color-column"></div>
        </div>
        <div id="w-node-_86948c09-9ea6-0d24-c71d-cfb6b9e521bf-b9e521b5" class="bg-column-mask">
          <div class="bg-color-column"></div>
          <div class="primary-color-column"></div>
        </div>
      </div>
      <div class="hero-section-overlay"></div>
    </header>
    <section class="section-60px">
      <div class="infinity-carousel-container-2deg-rotate primary">
        <div data-w-id="c3dc4773-4a3a-4bda-eadd-8abc4e6b0b93" class="infinity-slider-carousel">
          <div class="infinity-item-container inline">
            <div class="infinity-text">Visit Vista  </div>
            <div class="infinity-text">By ExploreX  </div>
            <div class="infinity-text">Visit Vista  </div>
          </div>
          <div class="infinity-item-container inline">
            <div class="infinity-text">By ExploreX  </div>
            <div class="infinity-text">Visit Vista  </div>
            <div class="infinity-text">By ExploreX  </div>
          </div>
        </div>
      </div>
      <div class="infinity-carousel-container-2deg-rotate">
        <div data-w-id="199af4cf-9391-de7e-fcca-051cab517297" class="infinity-slider-carousel">
          <div class="infinity-item-container inline">
            <div class="infinity-text">TRAVEL</div>
            <div class="infinity-text">JOURNEY</div>
            <div class="infinity-text">DISCOVER</div>
          </div>
          <div class="infinity-item-container inline">
            <div class="infinity-text">TRAVEL</div>
            <div class="infinity-text">JOURNEY</div>
            <div class="infinity-text">DISCOVER</div>
          </div>
        </div>
      </div>
    </section>

    <section class="section">
      <div class="container">
        <div class="title-bar">
          <div class="_2px-height-border"></div>
          <div class="product-bar-texts-vertical">
            <div class="dynamic-gradient-title">
              <div class="gradient-title">
                <div class="_8px-circle-title"></div>
                <div class="mask">
                  <div class="text">Popular Places</div>
                </div>
              </div>
              <div class="gradient-color"></div>
              <div class="gradient-color-initial-90"></div>
            </div>
            <div data-w-id="f1a75d16-09b6-443b-a25b-8f49522648ba" class="text-merge-title">
              <h2 class="heading">Our Recommendations</h2>
              <div class="absolute-style-text"></div>
            </div>
          </div>
          <div class="_2px-height-border right"></div>
        </div>
        <div class="w-dyn-list">
          <div role="list" class="_3-column-grid w-dyn-items">

          <?php foreach ($recommendations as $place): ?>
            <div role="listitem" class="w-dyn-item">
              <div data-w-id="3aa9b968-98e2-906a-c7d1-034fdca8e2e9" class="blog-card">
                <div class="blog-thubnail-mask"><a href="/visitvista/product/booking.php?id=<?php echo $place['id']; ?>"
                    class="mask-10px-rounded-full w-inline-block"><img src="<?= htmlspecialchars($place['image_url']) ?>"
                      loading="lazy" alt=""
                      sizes="(max-width: 479px) 100vw, (max-width: 767px) 92vw, (max-width: 991px) 46vw, 28vw"
                      srcset="<?= htmlspecialchars($place['image_url']) ?>, <?= htmlspecialchars($place['image_url']) ?>, <?= htmlspecialchars($place['image_url']) ?>"
                      class="blog-thumbnail-300px" /></a><a href="/visitvista/product/booking.php"
                    class="blog-category w-inline-block">
                    <div class="blog-category-left-shape"></div>
                    <div><?= htmlspecialchars($place['category']) ?></div>
                    <div class="blog-category-right-shape"></div>
                  </a>
                  <div data-w-id="86948c09-9ea6-0d24-c71d-cfb6b9e521b5" class="image-show-style">
                    <div class="bg-column-mask">
                      <div class="bg-color-column"></div>
                      <div class="primary-color-column"></div>
                    </div>
                    <div id="w-node-_86948c09-9ea6-0d24-c71d-cfb6b9e521b9-b9e521b5" class="bg-column-mask">
                      <div class="bg-color-column"></div>
                      <div class="primary-color-column"></div>
                    </div>
                    <div id="w-node-_86948c09-9ea6-0d24-c71d-cfb6b9e521bc-b9e521b5" class="bg-column-mask">
                      <div class="bg-color-column"></div>
                      <div class="primary-color-column"></div>
                    </div>
                    <div id="w-node-_86948c09-9ea6-0d24-c71d-cfb6b9e521bf-b9e521b5" class="bg-column-mask">
                      <div class="bg-color-column"></div>
                      <div class="primary-color-column"></div>
                    </div>
                  </div>
                </div>
                <div class="w-layout-vflex blog-body">
                  <div class="w-layout-vflex heading-category-wrapper">
                    <div class="horizontal-left-center-8px-gap-wrap">
                      <p href="#" class="_14px-text">Rp <?= htmlspecialchars($place['price'], 2) ?>/ Ticket</p>
                      <div class="_5px-circle"></div>
                      <div class="horizontal-left-center-5px-gap">
                        <p class="_14px-text">By</p><a href="/author/sara-lee" class="w-inline-block">
                          <p href="#" class="_14px-link"><?= htmlspecialchars($place['business_name']) ?></p>
                        </a>
                      </div>
                    </div>
                    <div class="horizontal-left-center-8px-gap-wrap">
                      <div class="horizontal-left-center-5px-gap">
                        <p class="_14px-text">Rated</p>
                        <div class="w-layout-hflex testimonial-star-wrapper">
                            <?php
                            // Get the full number of stars (floor of average_rating)
                            $fullStars = floor($place['average_rating']);

                            // Iterate 5 times for 5 possible stars
                            for($i = 1; $i <= 5; $i++): ?>
                                <div class="_16px-star-icon" style="color: <?= $i <= $fullStars ? '#FFD700' : '#808080' ?>">
                                    star
                                </div>
                            <?php endfor; ?>
                        </div>
                        <p class="_14px-text"><?= number_format($place['average_rating'], 1) ?></p>
                        <p class="_14px-text">(<?= htmlspecialchars($place['review_count']) ?> Reviews)</p>
                        </a>
                      </div>
                    </div>
                    <a href="/visitvista/product/booking.php" class="w-inline-block">
                      <h3 class="_24px-link"><?= htmlspecialchars($place['name']) ?></h3>
                    </a>
                    <div class="blog-divider">
                      <div class="blog-hover-divider"></div>
                    </div>
                  </div><a href="/visitvista/product/booking.php"
                    class="text-link-with-border w-inline-block">
                    <div>Read More</div>
                    <div class="mask">
                      <div class="link-border"></div>
                      <div class="link-border-secodnary"></div>
                    </div>
                  </a>
                </div>
              </div>
            </div>
          <?php endforeach; ?>

          </div>
        </div>
      </div>
    </section>

    <section class="section">
      <div class="container">
        <div class="title-bar">
          <div class="_2px-height-border"></div>
          <div class="product-bar-texts-vertical">
            <div class="dynamic-gradient-title">
              <div class="gradient-title">
                <div class="_8px-circle-title"></div>
                <div class="mask">
                  <div class="text">Testimonials</div>
                </div>
              </div>
              <div class="gradient-color"></div>
              <div class="gradient-color-initial-90"></div>
            </div>
            <div data-w-id="f1a75d16-09b6-443b-a25b-8f49522648ba" class="text-merge-title">
              <h2 class="heading">See What People Are Saying</h2>
              <div class="absolute-style-text"></div>
            </div>
          </div>
          <div class="_2px-height-border right"></div>
        </div>
        <div class="testimonial-container">

          <div data-w-id="03b75ead-4f93-cb93-b5b1-6ba555aa01e3"
            style="-webkit-transform:translate3d(0, 0%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(0, 0%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(0, 0%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(0, 0%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0)"
            class="testimonials-vertical-wrapper hide-in-tablet">
            <?php
            $limit = 5;
            foreach (array_slice($reviews, 0, $limit) as $review): ?>
            <div class="testimonial-white-30px-padding">
              <div class="testimonial-contents-5px-gap">
                <div class="space-between-center"><img loading="lazy" src="images/right.png" alt=""
                    class="image-40px" />
                  <div class="w-layout-hflex testimonial-star-wrapper">
                    <?php
                      // Get the full number of stars (floor of average_rating)
                      $starsString = htmlspecialchars($review['rating']);
                      $stars = (int)$starsString;

                    // Iterate 5 times for 5 possible stars
                    for($i = 1; $i <= 5; $i++): ?>
                      <div class="_16px-star-icon" style="color: <?= $i <= $stars ? '#FFD700' : '#808080' ?>">
                        star
                      </div>
                    <?php endfor; ?>
                  </div>
                </div>
                <div class="mt-15px-mb-25px">
                  <p>&quot;<?= htmlspecialchars($review['comment']) ?></p>
                </div>
                <div class="horizontal-left-center-15px-gap">
                  <div class="vertical-left-top">
                    <h3 class="_20px-title"><?= htmlspecialchars($review['reviewer_name']) ?></h3>
                    <div class="_14px-text"><?= htmlspecialchars($review['place_name']) ?></div>
                  </div>
                </div>
              </div>
            </div>
            <?php endforeach; ?>
          </div>

          <div data-w-id="03b75ead-4f93-cb93-b5b1-6ba555aa0146"
            style="-webkit-transform:translate3d(0, -50%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(0, -50%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(0, -50%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(0, -50%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0)"
            class="testimonials-vertical-wrapper hide-in-portrait">
            <?php
            $start = 6;
            $length = 11;
            foreach (array_slice($reviews, $start, $length) as $review): ?>
            <div class="testimonial-white-30px-padding">
              <div class="testimonial-contents-5px-gap">
                <div class="space-between-center"><img loading="lazy" src="images/right.png" alt=""
                    class="image-40px" />
                  <div class="w-layout-hflex testimonial-star-wrapper">
                    <?php
                      // Get the full number of stars (floor of average_rating)
                      $starsString = htmlspecialchars($review['rating']);
                      $stars = (int)$starsString;

                    // Iterate 5 times for 5 possible stars
                    for($i = 1; $i <= 5; $i++): ?>
                      <div class="_16px-star-icon" style="color: <?= $i <= $stars ? '#FFD700' : '#808080' ?>">
                        star
                      </div>
                    <?php endfor; ?>
                  </div>
                </div>
                <div class="mt-15px-mb-25px">
                  <p>&quot;<?= htmlspecialchars($review['comment']) ?></p>
                </div>
                <div class="horizontal-left-center-15px-gap">
                  <div class="vertical-left-top">
                    <h3 class="_20px-title"><?= htmlspecialchars($review['reviewer_name']) ?></h3>
                    <div class="_14px-text"><?= htmlspecialchars($review['place_name']) ?></div>
                  </div>
                </div>
              </div>
            </div>
            <?php endforeach; ?>
          </div>

          <div data-w-id="03b75ead-4f93-cb93-b5b1-6ba555aa01e3"
            style="-webkit-transform:translate3d(0, 0%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(0, 0%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(0, 0%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(0, 0%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0)"
            class="testimonials-vertical-wrapper hide-in-tablet">
            <?php
            $start = 12;
            $length = 17;
            foreach (array_slice($reviews, $start, $length) as $review): ?>
            <div class="testimonial-white-30px-padding">
              <div class="testimonial-contents-5px-gap">
                <div class="space-between-center"><img loading="lazy" src="images/right.png" alt=""
                    class="image-40px" />
                  <div class="w-layout-hflex testimonial-star-wrapper">
                    <?php
                      // Get the full number of stars (floor of average_rating)
                      $starsString = htmlspecialchars($review['rating']);
                      $stars = (int)$starsString;

                    // Iterate 5 times for 5 possible stars
                    for($i = 1; $i <= 5; $i++): ?>
                      <div class="_16px-star-icon" style="color: <?= $i <= $stars ? '#FFD700' : '#808080' ?>">
                        star
                      </div>
                    <?php endfor; ?>
                  </div>
                </div>
                <div class="mt-15px-mb-25px">
                  <p>&quot;<?= htmlspecialchars($review['comment']) ?></p>
                </div>
                <div class="horizontal-left-center-15px-gap">
                  <div class="vertical-left-top">
                    <h3 class="_20px-title"><?= htmlspecialchars($review['reviewer_name']) ?></h3>
                    <div class="_14px-text"><?= htmlspecialchars($review['place_name']) ?></div>
                  </div>
                </div>
              </div>
            </div>
            <?php endforeach; ?>
          </div>

          <div class="clip-overlay-top"></div>
          <div class="clip-overlay-bottom"></div>
        </div>
      </div>
    </section>

    <section class="section">
      <div class="container">
        <div class="_2-column-block margin-bottom-50px">
          <div class="contents">
            <div class="title">
              <div class="title-divider">
                <div class="primary-title-divider-loop"></div>
              </div>
              <div data-w-id="5b919fa1-84ae-d7b6-0ea1-41df149cc60e" class="_10px-diamond"></div>
              <div>Travel Journey</div>
            </div>
            <div data-w-id="31205a3c-7929-4802-de05-79618652852f" class="text-merge-title">
              <h2 class="heading">discover tourism</h2>
              <div class="absolute-style-text"></div>
            </div>
          </div>
        </div>
        <div data-w-id="805a000d-bea4-146f-c7db-8e5eb907e47d" class="process-block"><a href="#"
            class="circle-percentage-sticky w-inline-block">
            <div class="circle-inside-wrapper">
              <div class="circle-percentage-white">
                <h3 class="_24px-text-black">Travel Guide</h3>
                <div class="steps">
                  <div class="step-text-wrapper">
                    <div class="text">1</div>
                    <div class="text">2<br /></div>
                    <div class="text">3</div>
                    <div class="text">4</div>
                  </div>
                  <div>/</div>
                  <div>4</div>
                </div>
              </div>
              <div class="circle-percentage-color"></div>
            </div>
          </a>
          <div class="w-layout-vflex _50">
            <div class="process-divider">
              <div class="absolute-scrolling-color"></div>
            </div>
            <div class="process-card">
              <div class="icon-wrapper-90px"><img loading="lazy" src="images/startup-1.avif" alt=""
                  class="image-45px" /></div>
              <h3 class="_30px-title">Dream Destinations</h3>
              <div class="margin-bottom-20px">
                <p>Discover the perfect getaway, from serene beaches to majestic mountains.
                </p>
              </div>
              <ul role="list" class="vertical-list">
                <li class="list-item">Explore must-visit attractions and hidden gems.</li>
                <li class="list-item">Plan your trip with insider tips and recommendations.</li>
                <li class="list-item">Find the best times to visit and local events.</li>
              </ul>
            </div>
            <div class="process-card z-2">
              <div class="icon-wrapper-90px"><img loading="lazy" src="images/design-thinking.avif" alt=""
                  class="image-45px" /></div>
              <h3 class="_30px-title">Plan &amp; Book</h3>
              <div class="margin-bottom-20px">
                <p>Easily organize and book your travel with recommended itineraries.
                </p>
              </div>
              <ul role="list" class="vertical-list">
                <li class="list-item">Explore available travel packages.</li>
                <li class="list-item">Customize your itinerary.</li>
                <li class="list-item">Confirm bookings effortlessly.</li>
              </ul>
            </div>
            <div class="process-card z-3">
              <div class="icon-wrapper-90px"><img loading="lazy" src="images/startup-1.avif" alt="" class="image-45px" />
              </div>
              <h3 class="_30px-title">Local Experiences</h3>
              <div class="margin-bottom-20px">
                <p>Discover local cuisines, traditions, and activities that create unforgettable memories.
                </p>
              </div>
              <ul role="list" class="vertical-list">
                <li class="list-item">Taste authentic local cuisine.</li>
                <li class="list-item">Participate in cultural activities.</li>
                <li class="list-item">Discover hidden gems with expert guides.</li>
              </ul>
            </div>
            <div class="process-card z-4">
              <div class="icon-wrapper-90px"><img loading="lazy" src="images/design-thinking.avif" alt=""
                  class="image-45px" /></div>
              <h3 class="_30px-title">Share Your Story</h3>
              <div class="margin-bottom-20px">
                <p>Capture and share your adventure with a global travel community.
                </p>
              </div>
              <ul role="list" class="vertical-list">
                <li class="list-item">See what others are saying.</li>
                <li class="list-item">Write reviews to help other travelers.</li>
                <li class="list-item">Plan your trip based on the best suggestions.</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section data-w-id="69f36155-e088-485d-58ea-29e5ef88a9d4" class="horizontal-slider-section">
      <div class="camera">

        <div class="frame">
          <div class="item">
            <div class="full-width-height w-dyn-list">
              <div role="list" class="portfolio-horizontal w-dyn-items">
                <?php
                $start = 0;
                $length = 3;
                foreach (array_slice($places, $start, $length) as $place): ?>
                <div role="listitem" class="full-image w-dyn-item"><a data-w-id="d945ec06-2068-2df4-5892-acfa5542b07b"
                    href="/project/portfolio-for-photography-studio" class="portfolio-card w-inline-block"><img
                      src="<?php echo htmlspecialchars($place['image_url']); ?>" loading="lazy" alt="" sizes="(max-width: 767px) 32vw, 33vw"
                      srcset="<?php echo htmlspecialchars($place['image_url']); ?>, <?php echo htmlspecialchars($place['image_url']); ?>, <?php echo htmlspecialchars($place['image_url']); ?>"
                      class="portfolio-thumbnail" />
                    <div class="black-overlay"></div>
                    <div class="portfolio-info-card">
                      <h3 class="_20px-text-black"><?php echo htmlspecialchars($place['name']); ?></h3>
                    </div>
                  </a>
                </div>
                <?php endforeach; ?>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="full-width-height w-dyn-list">
              <div role="list" class="portfolio-horizontal w-dyn-items">
                <?php
                $start = 4;
                $length = 3;
                foreach (array_slice($places, $start, $length) as $place): ?>
                <div role="listitem" class="full-image w-dyn-item"><a data-w-id="d945ec06-2068-2df4-5892-acfa5542b07b"
                    href="/project/digital-marketing-campaign-for-startup" class="portfolio-card w-inline-block"><img
                      src="<?php echo htmlspecialchars($place['image_url']); ?>" loading="lazy" alt="" sizes="(max-width: 767px) 32vw, 33vw"
                      srcset="<?php echo htmlspecialchars($place['image_url']); ?>, <?php echo htmlspecialchars($place['image_url']); ?>, <?php echo htmlspecialchars($place['image_url']); ?>"
                      class="portfolio-thumbnail" />
                    <div class="black-overlay"></div>
                    <div class="portfolio-info-card">
                      <h3 class="_20px-text-black"><?php echo htmlspecialchars($place['name']); ?></h3>
                    </div>
                  </a>
                </div>
                <?php endforeach; ?>
              </div>
            </div>
          </div>
        </div>

        <div class="frame-reverse">
          <div class="item">
            <div class="full-width-height w-dyn-list">
              <div role="list" class="portfolio-horizontal w-dyn-items">
                <?php
                $start = 0;
                $length = 3;
                foreach (array_slice($places, $start, $length) as $place): ?>
                <div role="listitem" class="full-image w-dyn-item"><a data-w-id="d945ec06-2068-2df4-5892-acfa5542b07b"
                    href="/project/content-marketing-project" class="portfolio-card w-inline-block"><img
                      src="<?php echo htmlspecialchars($place['image_url']); ?>" loading="lazy" alt=""
                      sizes="(min-width: 767px) 32vw, 33vw"
                      srcset="<?php echo htmlspecialchars($place['image_url']); ?>, <?php echo htmlspecialchars($place['image_url']); ?>, <?php echo htmlspecialchars($place['image_url']); ?>"
                      class="portfolio-thumbnail" />
                    <div class="black-overlay"></div>
                    <div class="portfolio-info-card">
                      <h3 class="_20px-text-black"><?php echo htmlspecialchars($place['name']); ?></h3>
                    </div>
                  </a>
                </div>
                <?php endforeach; ?>

              </div>
            </div>
          </div>
          <div class="item">
            <div class="full-width-height w-dyn-list">
              <div role="list" class="portfolio-horizontal w-dyn-items">
                <?php
                $start = 4;
                $length = 3;
                foreach (array_slice($places, $start, $length) as $place): ?>
                <div role="listitem" class="full-image w-dyn-item"><a data-w-id="d945ec06-2068-2df4-5892-acfa5542b07b"
                    href="/project/website-redesign-project" class="portfolio-card w-inline-block"><img
                      src="<?php echo htmlspecialchars($place['image_url']); ?>" loading="lazy" alt=""
                      sizes="(min-width: 767px) 32vw, 33vw"
                      srcset="<?php echo htmlspecialchars($place['image_url']); ?>, <?php echo htmlspecialchars($place['image_url']); ?>, <?php echo htmlspecialchars($place['image_url']); ?>"
                      class="portfolio-thumbnail" />
                    <div class="black-overlay"></div>
                    <div class="portfolio-info-card">
                      <h3 class="_20px-text-black"><?php echo htmlspecialchars($place['name']); ?></h3>
                    </div>
                  </a>
                </div>
                <?php endforeach; ?>
              </div>
            </div>
          </div>
        </div>

        <a href="#" class="circle-percentage w-inline-block">
          <div class="circle-inside-wrapper">
            <div class="circle-percentage-white">
              <h2 class="_30px-text-black">More Places</h2>
            </div>
            <div class="circle-percentage-color"></div>
          </div>
        </a>
      </div>
    </section>

    <section class="section">
      <div class="container">
        <div class="title-bar">
          <div class="_2px-height-border"></div>
          <div class="product-bar-texts-vertical">
            <div class="dynamic-gradient-title">
              <div class="gradient-title">
                <div class="_8px-circle-title"></div>
                <div class="mask">
                  <div class="text">jogja updates</div>
                </div>
              </div>
              <div class="gradient-color"></div>
              <div class="gradient-color-initial-90"></div>
            </div>
            <div data-w-id="f1a75d16-09b6-443b-a25b-8f49522648ba" class="text-merge-title">
              <h2 class="heading">our latest news</h2>
              <div class="absolute-style-text"></div>
            </div>
          </div>
          <div class="_2px-height-border right"></div>
        </div>
        <div class="w-dyn-list">
          <div role="list" class="vertical-left-stretch w-dyn-items">
            <div role="listitem" class="w-dyn-item">
              <?php foreach($articles as $article): ?>
              <div data-w-id="904617dc-ba8b-90f7-616e-2c583349f757" class="service-list-card-wrapper"><a
                  href="/visitvista/project/article.php?id=<?php echo $article['id']; ?>" class="service-list-card w-inline-block">
                  <div class="service-logo-title-wrapper">
                    <div class="_60px-icon-wrapper"><img src="images/marketing-automation.avif" loading="lazy" alt=""
                        class="service-card-logo" /></div>
                    <h3 class="_30px-text"><?php echo htmlspecialchars($article['title']); ?></h3>
                  </div>
                  <div class="service-summery-wrapper">
                    <p class="service-summery"><?php echo htmlspecialchars($article['content']); ?></p>
                    <div
                      style="-webkit-transform:translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(-45deg) skew(0, 0);-moz-transform:translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(-45deg) skew(0, 0);-ms-transform:translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(-45deg) skew(0, 0);transform:translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(-45deg) skew(0, 0)"
                      class="service-arrow-link-rotate">
                      <div class="horizontal-wrapper-24px"><img src="images/frame-20-1-.svg" loading="lazy"
                          alt="Left Right Arrow" class="navigation-icon-image" /><img src="images/frame-20-1-.svg"
                          loading="lazy" width="12" alt="Left Right Arrow" class="navigation-icon-image" /></div>
                    </div>
                  </div>
                </a><img src="<?php echo htmlspecialchars($article['image_url']); ?>" loading="lazy"
                  style="-webkit-transform:translate3d(0, 0, 0) scale3d(1.4, 1.4, 1) rotateX(0) rotateY(0) rotateZ(-15deg) skew(0, 0);-moz-transform:translate3d(0, 0, 0) scale3d(1.4, 1.4, 1) rotateX(0) rotateY(0) rotateZ(-15deg) skew(0, 0);-ms-transform:translate3d(0, 0, 0) scale3d(1.4, 1.4, 1) rotateX(0) rotateY(0) rotateZ(-15deg) skew(0, 0);transform:translate3d(0, 0, 0) scale3d(1.4, 1.4, 1) rotateX(0) rotateY(0) rotateZ(-15deg) skew(0, 0);display:block;opacity:0"
                  alt="" sizes="100vw"
                  srcset="<?php echo htmlspecialchars($article['image_url']); ?>, <?php echo htmlspecialchars($article['image_url']); ?>, <?php echo htmlspecialchars($article['image_url']); ?>"
                  class="service-hover-image" />
                </div>
                <?php endforeach; ?>
            </div>

          </div>
        </div>
      </div>
    </section>

    <footer class="footer">
      <div class="container">
        <div data-w-id="3447bad0-4c97-caf6-2cc4-1b7d3321ffb7" class="footer-container">
          <div class="footer-block">
            <div><img width="70" loading="lazy" alt="" src="images/logovisitvista.png" class="site-logo" /></div>
            <div class="margin-bottom-23px">
              <p class="footer-text">Daftar sekarang dan optimalkan pengalaman wisata anda!</p>
            </div>
            <div class="horizontal-left-center-11px-gap"><img src="images/frame.avif" loading="lazy" alt="" class="image-24px" />
              <p class="_16px-text">Copyright © VisitVista by ExploreX</p>
            </div>
          </div>
          <div class="footer-block end">
            <div class="link-list">
              <a data-w-id="ae4630f3-25c8-1af0-bf6f-a34696446e8b" href="index.php"
                class="footer-link-wrapper w-inline-block">
                <div class="footer-link">
                  <div class="text">Home</div>
                  <div class="text">Home</div>
                </div>
                <div class="mask">
                  <div class="nav-border"></div>
                </div>
              </a>
              <a data-w-id="ae4630f3-25c8-1af0-bf6f-a34696446e8b" href="about-us.php"
                class="footer-link-wrapper w-inline-block">
                <div class="footer-link">
                  <div class="text">About</div>
                  <div class="text">About</div>
                </div>
                <div class="mask">
                  <div class="nav-border"></div>
                </div>
              </a>
              <a data-w-id="ae4630f3-25c8-1af0-bf6f-a34696446e8b" href="explore.php" class="footer-link-wrapper w-inline-block">
                <div class="footer-link">
                  <div class="text">Explore</div>
                  <div class="text">Explore</div>
                </div>
                <div class="mask">
                  <div class="nav-border"></div>
                </div>
              </a>
              <a data-w-id="ae4630f3-25c8-1af0-bf6f-a34696446e8b" href="article.php"
                class="footer-link-wrapper w-inline-block">
                <div class="footer-link">
                  <div class="text">Article</div>
                  <div class="text">Article</div>
                </div>
                <div class="mask">
                  <div class="nav-border"></div>
                </div>
              </a>
            </div>
            <div class="social-icons-container">
              <a href="http://instagram.com/rifqiwbsno" target="_blank" class="social-icon-wrapper w-inline-block">
                <img src="images/group-2027181.png" loading="lazy" alt="" class="footer-icon" />
              </a>
              <a href="http://instagram.com/lintanglangitan" target="_blank" class="social-icon-wrapper w-inline-block">
                <img src="images/group-2027181.png" loading="lazy" alt="" class="footer-icon" />
              </a>
              <a href="http://instagram.com/nfllqid" target="_blank" class="social-icon-wrapper w-inline-block">
                <img src="images/group-2027181.png" loading="lazy" alt="" class="footer-icon" />
              </a>
              <a href="http://instagram.com" target="_blank" class="social-icon-wrapper w-inline-block">
                <img src="images/group-2027181.png" loading="lazy" alt="" class="footer-icon" />
              </a>
            </div>
          </div>
        </div>
      </div>
      <div data-w-id="9fe381cd-c836-00c2-b807-19331181b79b" class="site-line-wrapper">
        <div class="line">
          <div class="line-infinity _1"></div>
        </div>
        <div class="line">
          <div class="line-infinity _2"></div>
        </div>
        <div class="line _3">
          <div class="line-infinity _3"></div>
        </div>
      </div>
    </footer>
    <div class="cursor-mouse-wrapper">
      <div class="main-cursor">
        <div class="cursor-mouse-pointer">
          <div class="side-parts"></div>
          <div class="cursor-mouse"></div>
          <div class="side-parts"></div>
        </div>
        <div class="cursor-circle"></div>
      </div>
      <div class="main-cursor horizontal">
        <div class="arrow-part left"></div>
        <div class="arrow-part right"></div>
        <div class="main-part"></div>
      </div>
    </div>
  </div>
  <script src="js/jquery.js" type="text/javascript"></script>
  <script src="js/webflow-script.js" type="text/javascript"></script>
</body>

</html>