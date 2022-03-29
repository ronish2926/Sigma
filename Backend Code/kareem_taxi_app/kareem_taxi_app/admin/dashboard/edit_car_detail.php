<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>List Of Products</title>

    <!-- Bootstrap core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"/>
    <link href="https://fonts.googleapis.com/css2?family=Kufam:wght@400;500;600;700;800;900&display=swap"
          rel="stylesheet">
    <link rel="stylesheet" href="../public/css/dropzone.css">
    <link rel="stylesheet" href="../public/css/jquery.tag.css">
    <link rel="stylesheet" href="../public/css/jquery.tagsinput-revisited.css">
    <!-- Custom styles for this template -->
    <link href="../public/css/main.css" rel="stylesheet">
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css"/>

</head>

<body class="shopping_add_products">

<div class="d-flex" id="wrapper">
    <?php
    $id = $_GET['id'];
    ?>
    <input type="hidden" id="driver-detail-id" value="<?php echo $id; ?>">

    <!-- Sidebar -->
    <div class=" border-right" id="sidebar-wrapper">
        <div class="sidebar-heading">

            <svg width="111px" height="30px" viewBox="0 0 111 30" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
                 xmlns="http://www.w3.org/2000/svg">
                <desc>Created with Lunacy</desc>
                <defs>
                    <path
                            d="M9.999 0L18.001 0Q18.2465 0 18.4916 0.0120442Q18.7368 0.0240885 18.9811 0.0481479Q19.2254 0.0722074 19.4682 0.108224Q19.711 0.144241 19.9517 0.192128Q20.1925 0.240015 20.4306 0.299657Q20.6687 0.3593 20.9036 0.430553Q21.1384 0.501807 21.3696 0.584501Q21.6007 0.667194 21.8274 0.761128Q22.0542 0.855062 22.2761 0.960011Q22.498 1.06496 22.7145 1.18067Q22.931 1.29638 23.1415 1.42257Q23.352 1.54876 23.5561 1.68514Q23.7602 1.82151 23.9574 1.96773Q24.1546 2.11395 24.3443 2.26967Q24.534 2.42539 24.7159 2.59023Q24.8978 2.75507 25.0714 2.92864Q25.2449 3.10221 25.4098 3.28408Q25.5746 3.46596 25.7303 3.6557Q25.886 3.84545 26.0323 4.0426Q26.1785 4.23976 26.3149 4.44385Q26.4512 4.64795 26.5774 4.85849Q26.7036 5.06903 26.8193 5.2855Q26.935 5.50198 27.04 5.72388Q27.1449 5.94577 27.2389 6.17255Q27.3328 6.39932 27.4155 6.63044Q27.4982 6.86155 27.5694 7.09644Q27.6407 7.33134 27.7003 7.56944Q27.76 7.80755 27.8079 8.04829Q27.8558 8.28904 27.8918 8.53184Q27.9278 8.77465 27.9519 9.01893Q27.9759 9.26321 27.988 9.50837Q28 9.75354 28 9.999L28 18.001Q28 18.2465 27.988 18.4916Q27.9759 18.7368 27.9518 18.9811Q27.9278 19.2254 27.8918 19.4682Q27.8558 19.711 27.8079 19.9517Q27.76 20.1925 27.7003 20.4306Q27.6407 20.6687 27.5694 20.9036Q27.4982 21.1384 27.4155 21.3696Q27.3328 21.6007 27.2389 21.8274Q27.1449 22.0542 27.04 22.2761Q26.935 22.498 26.8193 22.7145Q26.7036 22.931 26.5774 23.1415Q26.4512 23.352 26.3149 23.5561Q26.1785 23.7602 26.0323 23.9574Q25.886 24.1546 25.7303 24.3443Q25.5746 24.534 25.4098 24.7159Q25.2449 24.8978 25.0714 25.0714Q24.8978 25.2449 24.7159 25.4098Q24.534 25.5746 24.3443 25.7303Q24.1546 25.886 23.9574 26.0323Q23.7602 26.1785 23.5561 26.3149Q23.352 26.4512 23.1415 26.5774Q22.931 26.7036 22.7145 26.8193Q22.498 26.935 22.2761 27.04Q22.0542 27.1449 21.8274 27.2389Q21.6007 27.3328 21.3696 27.4155Q21.1384 27.4982 20.9036 27.5694Q20.6687 27.6407 20.4306 27.7003Q20.1925 27.76 19.9517 27.8079Q19.711 27.8558 19.4682 27.8918Q19.2254 27.9278 18.9811 27.9519Q18.7368 27.9759 18.4916 27.988Q18.2465 28 18.001 28L9.999 28Q9.75354 28 9.50837 27.988Q9.26321 27.9759 9.01893 27.9518Q8.77465 27.9278 8.53184 27.8918Q8.28904 27.8558 8.04829 27.8079Q7.80755 27.76 7.56944 27.7003Q7.33134 27.6407 7.09644 27.5694Q6.86155 27.4982 6.63044 27.4155Q6.39932 27.3328 6.17255 27.2389Q5.94577 27.1449 5.72388 27.04Q5.50198 26.935 5.2855 26.8193Q5.06903 26.7036 4.85849 26.5774Q4.64795 26.4512 4.44385 26.3149Q4.23976 26.1785 4.0426 26.0323Q3.84545 25.886 3.6557 25.7303Q3.46596 25.5746 3.28408 25.4098Q3.10221 25.2449 2.92864 25.0714Q2.75507 24.8978 2.59023 24.7159Q2.42539 24.534 2.26967 24.3443Q2.11395 24.1546 1.96773 23.9574Q1.82151 23.7602 1.68514 23.5561Q1.54876 23.352 1.42257 23.1415Q1.29638 22.931 1.18067 22.7145Q1.06496 22.498 0.960011 22.2761Q0.855062 22.0542 0.761128 21.8274Q0.667194 21.6007 0.584501 21.3696Q0.501807 21.1384 0.430553 20.9036Q0.3593 20.6687 0.299657 20.4306Q0.240015 20.1925 0.192128 19.9517Q0.144241 19.711 0.108224 19.4682Q0.0722074 19.2254 0.0481479 18.9811Q0.0240885 18.7368 0.0120442 18.4916Q0 18.2465 0 18.001L0 9.999Q0 9.75354 0.0120442 9.50837Q0.0240885 9.26321 0.0481479 9.01893Q0.0722074 8.77465 0.108224 8.53184Q0.144241 8.28904 0.192128 8.04829Q0.240015 7.80755 0.299657 7.56944Q0.3593 7.33134 0.430553 7.09644Q0.501807 6.86155 0.584501 6.63044Q0.667194 6.39932 0.761128 6.17255Q0.855062 5.94577 0.960011 5.72388Q1.06496 5.50198 1.18067 5.2855Q1.29638 5.06903 1.42257 4.85849Q1.54876 4.64795 1.68514 4.44385Q1.82151 4.23976 1.96773 4.0426Q2.11395 3.84545 2.26967 3.6557Q2.42539 3.46596 2.59023 3.28408Q2.75507 3.10221 2.92864 2.92864Q3.10221 2.75507 3.28408 2.59023Q3.46596 2.42539 3.6557 2.26967Q3.84545 2.11395 4.0426 1.96773Q4.23976 1.82151 4.44385 1.68514Q4.64795 1.54876 4.85849 1.42257Q5.06903 1.29638 5.2855 1.18067Q5.50198 1.06496 5.72388 0.960011Q5.94577 0.855062 6.17255 0.761128Q6.39932 0.667194 6.63044 0.584501Q6.86155 0.501807 7.09644 0.430553Q7.33134 0.3593 7.56944 0.299657Q7.80755 0.240015 8.04829 0.192128Q8.28904 0.144241 8.53184 0.108224Q8.77465 0.0722074 9.01893 0.0481479Q9.26321 0.0240885 9.50837 0.0120442Q9.75354 0 9.999 0Z"
                            transform="translate(0 1)" id="path_1" />
                    <path
                            d="M7.999 0L8.001 0Q8.19736 0 8.39349 0.00963514Q8.58962 0.0192703 8.78504 0.0385174Q8.98046 0.0577644 9.1747 0.0865771Q9.36893 0.11539 9.56153 0.153699Q9.75412 0.192007 9.9446 0.23972Q10.1351 0.287433 10.323 0.344434Q10.5109 0.401436 10.6958 0.467589Q10.8807 0.533742 11.0621 0.608888Q11.2435 0.684033 11.421 0.76799Q11.5985 0.851946 11.7717 0.944512Q11.9449 1.03708 12.1133 1.13803Q12.2817 1.23898 12.445 1.34807Q12.6083 1.45717 12.766 1.57414Q12.9237 1.69112 13.0755 1.81569Q13.2273 1.94026 13.3728 2.07213Q13.5183 2.204 13.6571 2.34285Q13.796 2.4817 13.9279 2.6272Q14.0597 2.7727 14.1843 2.92449Q14.3089 3.07628 14.4259 3.234Q14.5428 3.39172 14.6519 3.55499Q14.761 3.71826 14.862 3.88669Q14.9629 4.05512 15.0555 4.2283Q15.1481 4.40148 15.232 4.57899Q15.316 4.7565 15.3911 4.93791Q15.4663 5.11933 15.5324 5.30422Q15.5986 5.4891 15.6556 5.67701Q15.7126 5.86492 15.7603 6.0554Q15.808 6.24588 15.8463 6.43847Q15.8846 6.63106 15.9134 6.8253Q15.9422 7.01954 15.9615 7.21496Q15.9807 7.41038 15.9904 7.60651Q16 7.80264 16 7.999L16 8.001Q16 8.19736 15.9904 8.39349Q15.9807 8.58962 15.9615 8.78504Q15.9422 8.98046 15.9134 9.1747Q15.8846 9.36893 15.8463 9.56153Q15.808 9.75412 15.7603 9.9446Q15.7126 10.1351 15.6556 10.323Q15.5986 10.5109 15.5324 10.6958Q15.4663 10.8807 15.3911 11.0621Q15.316 11.2435 15.232 11.421Q15.1481 11.5985 15.0555 11.7717Q14.9629 11.9449 14.862 12.1133Q14.761 12.2817 14.6519 12.445Q14.5428 12.6083 14.4259 12.766Q14.3089 12.9237 14.1843 13.0755Q14.0597 13.2273 13.9279 13.3728Q13.796 13.5183 13.6571 13.6571Q13.5183 13.796 13.3728 13.9279Q13.2273 14.0597 13.0755 14.1843Q12.9237 14.3089 12.766 14.4259Q12.6083 14.5428 12.445 14.6519Q12.2817 14.761 12.1133 14.862Q11.9449 14.9629 11.7717 15.0555Q11.5985 15.1481 11.421 15.232Q11.2435 15.316 11.0621 15.3911Q10.8807 15.4663 10.6958 15.5324Q10.5109 15.5986 10.323 15.6556Q10.1351 15.7126 9.9446 15.7603Q9.75412 15.808 9.56153 15.8463Q9.36893 15.8846 9.1747 15.9134Q8.98046 15.9422 8.78504 15.9615Q8.58962 15.9807 8.39349 15.9904Q8.19736 16 8.001 16L7.999 16Q7.80264 16 7.60651 15.9904Q7.41038 15.9807 7.21496 15.9615Q7.01954 15.9422 6.8253 15.9134Q6.63106 15.8846 6.43847 15.8463Q6.24588 15.808 6.0554 15.7603Q5.86492 15.7126 5.67701 15.6556Q5.4891 15.5986 5.30422 15.5324Q5.11933 15.4663 4.93791 15.3911Q4.7565 15.316 4.57899 15.232Q4.40148 15.1481 4.2283 15.0555Q4.05512 14.9629 3.88669 14.862Q3.71826 14.761 3.55499 14.6519Q3.39172 14.5428 3.234 14.4259Q3.07628 14.3089 2.92449 14.1843Q2.7727 14.0597 2.6272 13.9279Q2.4817 13.796 2.34285 13.6571Q2.204 13.5183 2.07213 13.3728Q1.94026 13.2273 1.81569 13.0755Q1.69112 12.9237 1.57414 12.766Q1.45717 12.6083 1.34807 12.445Q1.23898 12.2817 1.13803 12.1133Q1.03708 11.9449 0.944512 11.7717Q0.851946 11.5985 0.76799 11.421Q0.684033 11.2435 0.608888 11.0621Q0.533742 10.8807 0.467589 10.6958Q0.401436 10.5109 0.344434 10.323Q0.287433 10.1351 0.23972 9.9446Q0.192007 9.75412 0.153699 9.56153Q0.11539 9.36893 0.0865771 9.1747Q0.0577644 8.98046 0.0385174 8.78504Q0.0192703 8.58962 0.00963514 8.39349Q0 8.19736 0 8.001L0 7.999Q0 7.80264 0.00963514 7.60651Q0.0192703 7.41038 0.0385174 7.21496Q0.0577644 7.01954 0.0865771 6.8253Q0.11539 6.63106 0.153699 6.43847Q0.192007 6.24588 0.23972 6.0554Q0.287433 5.86492 0.344434 5.67701Q0.401436 5.4891 0.467589 5.30422Q0.533742 5.11933 0.608888 4.93791Q0.684033 4.7565 0.76799 4.57899Q0.851946 4.40148 0.944512 4.2283Q1.03708 4.05512 1.13803 3.88669Q1.23898 3.71826 1.34807 3.55499Q1.45717 3.39172 1.57414 3.234Q1.69112 3.07628 1.81569 2.92449Q1.94026 2.7727 2.07213 2.6272Q2.204 2.4817 2.34285 2.34285Q2.4817 2.204 2.6272 2.07213Q2.7727 1.94026 2.92449 1.81569Q3.07628 1.69112 3.234 1.57414Q3.39172 1.45717 3.55499 1.34807Q3.71826 1.23898 3.88669 1.13803Q4.05512 1.03708 4.2283 0.944512Q4.40148 0.851946 4.57899 0.76799Q4.7565 0.684033 4.93791 0.608888Q5.11933 0.533742 5.30422 0.467589Q5.4891 0.401436 5.67701 0.344434Q5.86492 0.287433 6.0554 0.23972Q6.24588 0.192007 6.43847 0.153699Q6.63106 0.11539 6.8253 0.0865771Q7.01954 0.0577644 7.21496 0.0385174Q7.41038 0.0192703 7.60651 0.00963514Q7.80264 0 7.999 0L7.999 0Z"
                            transform="translate(11 2)" id="path_2" />
                    <clipPath id="clip_1">
                        <use xlink:href="#path_1" />
                    </clipPath>
                    <clipPath id="clip_2">
                        <use xlink:href="#path_2" />
                    </clipPath>
                </defs>
                <g id="Logo">
                    <g id="Square" fill="#44444F" transform="translate(38 0)">
                        <path
                                d="M10.44 20.22Q10.98 19.31 10.98 18.23Q10.98 16.87 10.38 16.03Q9.78 15.19 8.93 14.77Q8.08 14.35 6.72 13.87Q5.74 13.55 5.17 13.29Q4.6 13.03 4.23 12.62Q3.86 12.21 3.86 11.59Q3.86 10.81 4.34 10.4Q4.82 9.99 5.6 9.99Q6.5 9.99 7.02 10.48Q7.54 10.97 7.66 11.73L10.7 11.73Q10.52 9.93 9.19 8.85Q7.86 7.77 5.62 7.77Q3.46 7.77 2.15 8.82Q0.84 9.87 0.84 11.69Q0.84 13.01 1.43 13.83Q2.02 14.65 2.86 15.08Q3.7 15.51 5.02 15.95Q6.04 16.29 6.62 16.55Q7.2 16.81 7.58 17.24Q7.96 17.67 7.96 18.33Q7.96 19.07 7.49 19.54Q7.02 20.01 6.14 20.01Q5.16 20.01 4.57 19.44Q3.98 18.87 3.88 18.01L0.88 18.01Q0.98 19.29 1.69 20.25Q2.4 21.21 3.58 21.72Q4.76 22.23 6.26 22.23Q7.78 22.23 8.84 21.68Q9.9 21.13 10.44 20.22ZM56.08 13.13Q56.7 12.07 57.72 11.46Q58.74 10.85 60 10.85L60 13.87L59.18 13.87Q57.5161 13.87 56.7453 14.6997Q56.08 15.4158 56.08 16.75L56.08 22.09L53.26 22.09L53.26 11.01L56.08 11.01L56.08 13.13ZM46.48 11.53Q45.48 10.87 44.08 10.87Q42.68 10.87 41.56 11.55Q40.44 12.23 39.81 13.52Q39.18 14.81 39.18 16.55Q39.18 18.29 39.81 19.58Q40.44 20.87 41.56 21.55Q42.68 22.23 44.08 22.23Q45.48 22.23 46.48 21.56Q47.48 20.89 47.9 19.77L47.9 22.09L50.7 22.09L50.7 11.01L47.9 11.01L47.9 13.31Q47.48 12.19 46.48 11.53ZM71.88 17.09Q71.98 16.55 71.98 16.13Q71.98 14.61 71.31 13.42Q70.64 12.23 69.41 11.55Q68.18 10.87 66.54 10.87Q64.92 10.87 63.66 11.55Q62.4 12.23 61.7 13.52Q61 14.81 61 16.55Q61 18.29 61.7 19.57Q62.4 20.85 63.66 21.54Q64.92 22.23 66.54 22.23Q67.92 22.23 69.05 21.71Q70.18 21.19 70.9 20.27Q71.62 19.35 71.84 18.19L68.86 18.19Q68.68 19.01 68.03 19.49Q67.38 19.97 66.4 19.97Q65.3 19.97 64.56 19.27Q63.82 18.57 63.76 17.09L71.88 17.09ZM19.8 11.44Q18.88 10.89 17.6 10.89Q16.18 10.89 15.02 11.61Q13.86 12.33 13.18 13.62Q12.5 14.91 12.5 16.59Q12.5 18.25 13.18 19.53Q13.86 20.81 15.02 21.51Q16.18 22.21 17.6 22.21Q18.86 22.21 19.77 21.62Q20.68 21.03 21.22 19.95L21.22 27.37L24.02 27.37L24.02 11.01L21.22 11.01L21.22 12.99Q20.72 11.99 19.8 11.44ZM37.18 22.09L34.36 22.09L34.36 19.85Q33.92 20.97 32.91 21.6Q31.9 22.23 30.58 22.23Q28.66 22.23 27.52 20.97Q26.38 19.71 26.38 17.45L26.38 11.01L29.18 11.01L29.18 17.13Q29.18 18.45 29.86 19.18Q30.54 19.91 31.7 19.91Q32.92 19.91 33.64 19.13Q34.36 18.35 34.36 16.89L34.36 11.01L37.18 11.01L37.18 22.09ZM68.43 13.79Q69.2 14.49 69.14 15.85L63.76 15.85Q63.84 14.49 64.62 13.79Q65.4 13.09 66.54 13.09Q67.66 13.09 68.43 13.79ZM42.84 14.19Q43.64 13.33 44.96 13.33Q46.24 13.33 47.07 14.2Q47.9 15.07 47.9 16.55Q47.9 18.01 47.07 18.88Q46.24 19.75 44.96 19.75Q43.64 19.75 42.84 18.9Q42.04 18.05 42.04 16.55Q42.04 15.05 42.84 14.19ZM16.19 14.2Q17.02 13.35 18.28 13.35Q19.08 13.35 19.75 13.72Q20.42 14.09 20.82 14.81Q21.22 15.53 21.22 16.55Q21.22 17.57 20.82 18.29Q20.42 19.01 19.74 19.38Q19.06 19.75 18.28 19.75Q17.02 19.75 16.19 18.94Q15.36 18.13 15.36 16.59Q15.36 15.05 16.19 14.2Z" />
                    </g>
                    <g id="Rectangle">
                        <g clip-path="url(#clip_1)">
                            <use xlink:href="#path_1" fill="none" stroke="#0073FF" stroke-width="8" />
                        </g>
                    </g>
                    <g id="Rectangle-Copy">
                        <g clip-path="url(#clip_2)">
                            <use xlink:href="#path_2" fill="none" stroke="#0073FF" stroke-width="8" />
                        </g>
                    </g>
                </g>
            </svg></div>
        <div class="list-group list-group-flush">
            <a href="#" class="list-group-item list-group-item-action ">Main</a>

            <a href="index.php" class="list-group-item list-group-item-action  ">
                <svg version="1.1" style="margin-top: -12px;" id="Layer_1" width="30px" height="25px"
                     xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                     viewBox="0 0 128 128" style="enable-background:new 0 0 128 128;" xml:space="preserve">
                  <style type="text/css">
                      .st0 {
                          fill: #686499;
                      }

                      .st1 {
                          fill: #EBD7FF;
                      }

                      .st2 {
                          fill: #CFA2ED;
                      }

                      .st3 {
                          fill: #676F77;
                      }

                      .st4 {
                          fill: #444B54;
                      }

                      .st5 {
                          fill: none;
                          stroke: #444B54;
                          stroke-width: 6;
                          stroke-linecap: round;
                          stroke-linejoin: round;
                          stroke-miterlimit: 10;
                      }

                      .st6 {
                          fill: #FFFFFF;
                      }

                      .st7 {
                          fill: #FF5576;
                      }

                      .st8 {
                          fill: #E9EEF4;
                      }

                      .st9 {
                          fill: #FCCA3D;
                      }

                      .st10 {
                          fill: #F2A50C;
                      }

                      .st11 {
                          fill: none;
                          stroke: #FFFFFF;
                          stroke-width: 6;
                          stroke-linecap: round;
                          stroke-linejoin: round;
                          stroke-miterlimit: 10;
                      }

                      .st12 {
                          fill: none;
                          stroke: #404242;
                          stroke-width: 1.5;
                          stroke-linecap: round;
                          stroke-linejoin: round;
                          stroke-miterlimit: 10;
                      }

                      .st13 {
                          fill: none;
                          stroke: #373536;
                          stroke-width: 1.5;
                          stroke-linecap: round;
                          stroke-linejoin: round;
                          stroke-miterlimit: 10;
                      }

                      .st14 {
                          fill: #E4C2FF;
                      }

                      .st15 {
                          fill: none;
                          stroke: #686499;
                          stroke-width: 6;
                          stroke-linecap: round;
                          stroke-linejoin: round;
                          stroke-miterlimit: 10;
                      }

                      .st16 {
                          fill: #DB3E64;
                      }

                      .st17 {
                          fill: #9B8272;
                      }

                      .st18 {
                          fill: #EFD5BE;
                      }
                  </style>
                    <g>
                        <path class="st6" d="M93,60H35c-5.1,0-9.4,3.9-10,9L21,110h86l-4.1-41C102.4,63.9,98.1,60,93,60z" />
                        <g>
                            <path class="st8" d="M107,110l-4.1-41c0-0.3-0.1-0.5-0.1-0.8c-1-5.6-9.4-4.2-8.8,1.4l0.8,8.4c1.2,11.8-8.1,22-19.9,22H42
                   c-5.7,0-10.5,4.3-11,10v0H107z" />
                        </g>
                        <path class="st9"
                              d="M107,124H21c-3.9,0-7-3.1-7-7v0c0-3.9,3.1-7,7-7h86c3.9,0,7,3.1,7,7v0C114,120.9,110.9,124,107,124z" />
                        <path class="st5"
                              d="M107,124H21c-3.9,0-7-3.1-7-7v0c0-3.9,3.1-7,7-7h86c3.9,0,7,3.1,7,7v0C114,120.9,110.9,124,107,124z" />
                        <path class="st5" d="M107,110l-4.1-41c-0.5-5.1-4.8-9-10-9H35c-5.1,0-9.4,3.9-10,9L22,100" />
                        <g>
                            <rect x="39" y="75" class="st4" width="10" height="10" />
                            <rect x="59" y="75" class="st4" width="10" height="10" />
                            <rect x="49" y="85" class="st4" width="10" height="10" />
                            <rect x="79" y="75" class="st4" width="10" height="10" />
                            <rect x="69" y="85" class="st4" width="10" height="10" />
                        </g>
                    </g>
                </svg>
                Overview</a>
            <a href="payment_method.php" class="list-group-item list-group-item-action ">
                <svg version="1.1" id="Layer_1" width="25px" height="20px" xmlns="http://www.w3.org/2000/svg"
                     xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 128 128"
                     style="enable-background:new 0 0 128 128;" xml:space="preserve">
                  <style type="text/css">
                      .st0 {
                          fill: #686499;
                      }

                      .st1 {
                          fill: #EBD7FF;
                      }

                      .st2 {
                          fill: #CFA2ED;
                      }

                      .st3 {
                          fill: #676F77;
                      }

                      .st4 {
                          fill: #444B54;
                      }

                      .st5 {
                          fill: none;
                          stroke: #444B54;
                          stroke-width: 6;
                          stroke-linecap: round;
                          stroke-linejoin: round;
                          stroke-miterlimit: 10;
                      }

                      .st6 {
                          fill: #FFFFFF;
                      }

                      .st7 {
                          fill: #FF5576;
                      }

                      .st8 {
                          fill: #E9EEF4;
                      }

                      .st9 {
                          fill: #FCCA3D;
                      }

                      .st10 {
                          fill: #F2A50C;
                      }

                      .st11 {
                          fill: none;
                          stroke: #FFFFFF;
                          stroke-width: 6;
                          stroke-linecap: round;
                          stroke-linejoin: round;
                          stroke-miterlimit: 10;
                      }

                      .st12 {
                          fill: none;
                          stroke: #404242;
                          stroke-width: 1.5;
                          stroke-linecap: round;
                          stroke-linejoin: round;
                          stroke-miterlimit: 10;
                      }

                      .st13 {
                          fill: none;
                          stroke: #373536;
                          stroke-width: 1.5;
                          stroke-linecap: round;
                          stroke-linejoin: round;
                          stroke-miterlimit: 10;
                      }

                      .st14 {
                          fill: #E4C2FF;
                      }

                      .st15 {
                          fill: none;
                          stroke: #686499;
                          stroke-width: 6;
                          stroke-linecap: round;
                          stroke-linejoin: round;
                          stroke-miterlimit: 10;
                      }

                      .st16 {
                          fill: #DB3E64;
                      }

                      .st17 {
                          fill: #9B8272;
                      }

                      .st18 {
                          fill: #EFD5BE;
                      }
                  </style>
                    <g>
                        <path class="st4"
                              d="M109,34H19c-3.9,0-7-3.1-7-7v0c0-3.9,3.1-7,7-7h90c3.9,0,7,3.1,7,7v0C116,30.9,112.9,34,109,34z" />
                        <path class="st5"
                              d="M109,34H19c-3.9,0-7-3.1-7-7v0c0-3.9,3.1-7,7-7h90c3.9,0,7,3.1,7,7v0C116,30.9,112.9,34,109,34z" />
                        <path class="st6"
                              d="M29,101.9L29,27l70,0l0,74.9c0,5.5-4.5,10-10,10l-50,0C33.5,111.9,29,107.5,29,101.9z" />
                        <circle class="st8" cx="49" cy="90.6" r="10" />
                        <circle class="st8" cx="49" cy="76.6" r="10" />
                        <rect x="68.7" y="27" class="st9" width="15.3" height="83.6" />
                        <path class="st5" d="M29,27l0,74c0,5.5,4.5,10,10,10l50,0c5.5,0,10-4.5,10-10l0-74" />
                    </g>
                </svg>


                Payment Method</a>
            <a href="countries.php" class="list-group-item list-group-item-action active ">
                <svg version="1.1" id="Layer_1" width="25px" height="20px" xmlns="http://www.w3.org/2000/svg"
                     xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 128 128"
                     style="enable-background:new 0 0 128 128;" xml:space="preserve">
                  <style type="text/css">
                      .st0 {
                          fill: #686499;
                      }

                      .st1 {
                          fill: #EBD7FF;
                      }

                      .st2 {
                          fill: #CFA2ED;
                      }

                      .st3 {
                          fill: #676F77;
                      }

                      .st4 {
                          fill: #444B54;
                      }

                      .st5 {
                          fill: none;
                          stroke: #444B54;
                          stroke-width: 6;
                          stroke-linecap: round;
                          stroke-linejoin: round;
                          stroke-miterlimit: 10;
                      }

                      .st6 {
                          fill: #FFFFFF;
                      }

                      .st7 {
                          fill: #FF5576;
                      }

                      .st8 {
                          fill: #E9EEF4;
                      }

                      .st9 {
                          fill: #FCCA3D;
                      }

                      .st10 {
                          fill: #F2A50C;
                      }

                      .st11 {
                          fill: none;
                          stroke: #FFFFFF;
                          stroke-width: 6;
                          stroke-linecap: round;
                          stroke-linejoin: round;
                          stroke-miterlimit: 10;
                      }

                      .st12 {
                          fill: none;
                          stroke: #404242;
                          stroke-width: 1.5;
                          stroke-linecap: round;
                          stroke-linejoin: round;
                          stroke-miterlimit: 10;
                      }

                      .st13 {
                          fill: none;
                          stroke: #373536;
                          stroke-width: 1.5;
                          stroke-linecap: round;
                          stroke-linejoin: round;
                          stroke-miterlimit: 10;
                      }

                      .st14 {
                          fill: #E4C2FF;
                      }

                      .st15 {
                          fill: none;
                          stroke: #686499;
                          stroke-width: 6;
                          stroke-linecap: round;
                          stroke-linejoin: round;
                          stroke-miterlimit: 10;
                      }

                      .st16 {
                          fill: #DB3E64;
                      }

                      .st17 {
                          fill: #9B8272;
                      }

                      .st18 {
                          fill: #EFD5BE;
                      }
                  </style>
                    <g>
                        <path class="st4"
                              d="M109,27H19c-3.9,0-7-3.1-7-7v0c0-3.9,3.1-7,7-7h90c3.9,0,7,3.1,7,7v0C116,23.9,112.9,27,109,27z" />
                        <polygon class="st6" points="99,20 29,20 29,112 39,122 49,112 59,122 69,112 79,122 89,112 99,122 	" />
                        <path class="st4"
                              d="M29,115c-1.7,0-3-1.3-3-3V20c0-1.7,1.3-3,3-3s3,1.3,3,3v92C32,113.7,30.7,115,29,115z" />
                        <path class="st4" d="M99,125c-0.8,0-1.5-0.3-2.1-0.9l-7.9-7.9l-7.9,7.9c-1.2,1.2-3.1,1.2-4.2,0l-7.9-7.9l-7.9,7.9
                 c-1.2,1.2-3.1,1.2-4.2,0l-7.9-7.9l-7.9,7.9c-1.2,1.2-3.1,1.2-4.2,0c-1.2-1.2-1.2-3.1,0-4.2l10-10c1.2-1.2,3.1-1.2,4.2,0l7.9,7.9
                 l7.9-7.9c1.2-1.2,3.1-1.2,4.2,0l7.9,7.9l7.9-7.9c1.2-1.2,3.1-1.2,4.2,0l4.9,4.9V20c0-1.7,1.3-3,3-3s3,1.3,3,3v102
                 c0,1.2-0.7,2.3-1.9,2.8C99.8,124.9,99.4,125,99,125z" />
                        <path class="st9" d="M84,42H44c-1.7,0-3-1.3-3-3s1.3-3,3-3h40c1.7,0,3,1.3,3,3S85.7,42,84,42z" />
                        <path class="st9" d="M84,57H44c-1.7,0-3-1.3-3-3s1.3-3,3-3h40c1.7,0,3,1.3,3,3S85.7,57,84,57z" />
                        <path class="st9" d="M84,72H44c-1.7,0-3-1.3-3-3s1.3-3,3-3h40c1.7,0,3,1.3,3,3S85.7,72,84,72z" />
                        <path class="st9" d="M74,87H44c-1.7,0-3-1.3-3-3s1.3-3,3-3h30c1.7,0,3,1.3,3,3S75.7,87,74,87z" />
                        <path class="st9"
                              d="M84,87c-0.8,0-1.6-0.3-2.1-0.9c-0.1-0.1-0.3-0.3-0.4-0.5c-0.1-0.2-0.2-0.3-0.3-0.5s-0.1-0.4-0.2-0.6
                 c0-0.2-0.1-0.4-0.1-0.6c0-0.8,0.3-1.6,0.9-2.1c0.1-0.1,0.3-0.3,0.4-0.4c0.2-0.1,0.3-0.2,0.5-0.3c0.2-0.1,0.4-0.1,0.6-0.2
                 c0.4-0.1,0.8-0.1,1.2,0c0.2,0,0.4,0.1,0.6,0.2c0.2,0.1,0.4,0.2,0.5,0.3c0.2,0.1,0.3,0.2,0.4,0.4c0.6,0.6,0.9,1.3,0.9,2.1
                 c0,0.2,0,0.4-0.1,0.6c0,0.2-0.1,0.4-0.2,0.6c-0.1,0.2-0.2,0.4-0.3,0.5c-0.1,0.2-0.2,0.3-0.4,0.5C85.6,86.7,84.8,87,84,87z" />
                        <path class="st4" d="M109,30H98.8c-1.7,0-2-1.3-2-3s0.3-3,2-3H109c2.2,0,4-1.8,4-4s-1.8-4-4-4H19c-2.2,0-4,1.8-4,4s1.8,4,4,4h9.8
                 c1.7,0,2,1.3,2,3s-0.3,3-2,3H19c-5.5,0-10-4.5-10-10s4.5-10,10-10h90c5.5,0,10,4.5,10,10S114.5,30,109,30z" />
                    </g>
                </svg>
                Countries</a>
            <a href="list_of_citys.php" class="list-group-item list-group-item-action ">
                <svg version="1.1" id="Layer_1" width="25px" height="20px" xmlns="http://www.w3.org/2000/svg"
                     xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 128 128"
                     style="enable-background:new 0 0 128 128;" xml:space="preserve">
                  <style type="text/css">
                      .st0 {
                          fill: #686499;
                      }

                      .st1 {
                          fill: #EBD7FF;
                      }

                      .st2 {
                          fill: #CFA2ED;
                      }

                      .st3 {
                          fill: #676F77;
                      }

                      .st4 {
                          fill: #444B54;
                      }

                      .st5 {
                          fill: none;
                          stroke: #444B54;
                          stroke-width: 6;
                          stroke-linecap: round;
                          stroke-linejoin: round;
                          stroke-miterlimit: 10;
                      }

                      .st6 {
                          fill: #FFFFFF;
                      }

                      .st7 {
                          fill: #FF5576;
                      }

                      .st8 {
                          fill: #E9EEF4;
                      }

                      .st9 {
                          fill: #FCCA3D;
                      }

                      .st10 {
                          fill: #F2A50C;
                      }

                      .st11 {
                          fill: none;
                          stroke: #FFFFFF;
                          stroke-width: 6;
                          stroke-linecap: round;
                          stroke-linejoin: round;
                          stroke-miterlimit: 10;
                      }

                      .st12 {
                          fill: none;
                          stroke: #404242;
                          stroke-width: 1.5;
                          stroke-linecap: round;
                          stroke-linejoin: round;
                          stroke-miterlimit: 10;
                      }

                      .st13 {
                          fill: none;
                          stroke: #373536;
                          stroke-width: 1.5;
                          stroke-linecap: round;
                          stroke-linejoin: round;
                          stroke-miterlimit: 10;
                      }

                      .st14 {
                          fill: #E4C2FF;
                      }

                      .st15 {
                          fill: none;
                          stroke: #686499;
                          stroke-width: 6;
                          stroke-linecap: round;
                          stroke-linejoin: round;
                          stroke-miterlimit: 10;
                      }

                      .st16 {
                          fill: #DB3E64;
                      }

                      .st17 {
                          fill: #9B8272;
                      }

                      .st18 {
                          fill: #EFD5BE;
                      }
                  </style>
                    <g>
                        <path class="st4"
                              d="M109,27H19c-3.9,0-7-3.1-7-7v0c0-3.9,3.1-7,7-7h90c3.9,0,7,3.1,7,7v0C116,23.9,112.9,27,109,27z" />
                        <polygon class="st6" points="99,20 29,20 29,112 39,122 49,112 59,122 69,112 79,122 89,112 99,122 	" />
                        <path class="st4"
                              d="M29,115c-1.7,0-3-1.3-3-3V20c0-1.7,1.3-3,3-3s3,1.3,3,3v92C32,113.7,30.7,115,29,115z" />
                        <path class="st4" d="M99,125c-0.8,0-1.5-0.3-2.1-0.9l-7.9-7.9l-7.9,7.9c-1.2,1.2-3.1,1.2-4.2,0l-7.9-7.9l-7.9,7.9
                 c-1.2,1.2-3.1,1.2-4.2,0l-7.9-7.9l-7.9,7.9c-1.2,1.2-3.1,1.2-4.2,0c-1.2-1.2-1.2-3.1,0-4.2l10-10c1.2-1.2,3.1-1.2,4.2,0l7.9,7.9
                 l7.9-7.9c1.2-1.2,3.1-1.2,4.2,0l7.9,7.9l7.9-7.9c1.2-1.2,3.1-1.2,4.2,0l4.9,4.9V20c0-1.7,1.3-3,3-3s3,1.3,3,3v102
                 c0,1.2-0.7,2.3-1.9,2.8C99.8,124.9,99.4,125,99,125z" />
                        <path class="st9" d="M84,42H44c-1.7,0-3-1.3-3-3s1.3-3,3-3h40c1.7,0,3,1.3,3,3S85.7,42,84,42z" />
                        <path class="st9" d="M84,57H44c-1.7,0-3-1.3-3-3s1.3-3,3-3h40c1.7,0,3,1.3,3,3S85.7,57,84,57z" />
                        <path class="st9" d="M84,72H44c-1.7,0-3-1.3-3-3s1.3-3,3-3h40c1.7,0,3,1.3,3,3S85.7,72,84,72z" />
                        <path class="st9" d="M74,87H44c-1.7,0-3-1.3-3-3s1.3-3,3-3h30c1.7,0,3,1.3,3,3S75.7,87,74,87z" />
                        <path class="st9"
                              d="M84,87c-0.8,0-1.6-0.3-2.1-0.9c-0.1-0.1-0.3-0.3-0.4-0.5c-0.1-0.2-0.2-0.3-0.3-0.5s-0.1-0.4-0.2-0.6
                 c0-0.2-0.1-0.4-0.1-0.6c0-0.8,0.3-1.6,0.9-2.1c0.1-0.1,0.3-0.3,0.4-0.4c0.2-0.1,0.3-0.2,0.5-0.3c0.2-0.1,0.4-0.1,0.6-0.2
                 c0.4-0.1,0.8-0.1,1.2,0c0.2,0,0.4,0.1,0.6,0.2c0.2,0.1,0.4,0.2,0.5,0.3c0.2,0.1,0.3,0.2,0.4,0.4c0.6,0.6,0.9,1.3,0.9,2.1
                 c0,0.2,0,0.4-0.1,0.6c0,0.2-0.1,0.4-0.2,0.6c-0.1,0.2-0.2,0.4-0.3,0.5c-0.1,0.2-0.2,0.3-0.4,0.5C85.6,86.7,84.8,87,84,87z" />
                        <path class="st4" d="M109,30H98.8c-1.7,0-2-1.3-2-3s0.3-3,2-3H109c2.2,0,4-1.8,4-4s-1.8-4-4-4H19c-2.2,0-4,1.8-4,4s1.8,4,4,4h9.8
                 c1.7,0,2,1.3,2,3s-0.3,3-2,3H19c-5.5,0-10-4.5-10-10s4.5-10,10-10h90c5.5,0,10,4.5,10,10S114.5,30,109,30z" />
                    </g>
                </svg>
                List of City</a>
            <a href="report.php" class="list-group-item list-group-item-action ">
                <svg version="1.1" id="Layer_1" width="25px" height="20px" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                     viewBox="0 0 128 128" style="enable-background:new 0 0 128 128;" xml:space="preserve">
             <style type="text/css">
                 .st0{fill:#686499;}
                 .st1{fill:#EBD7FF;}
                 .st2{fill:#CFA2ED;}
                 .st3{fill:#676F77;}
                 .st4{fill:#444B54;}
                 .st5{fill:none;stroke:#444B54;stroke-width:6;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;}
                 .st6{fill:#FFFFFF;}
                 .st7{fill:#FF5576;}
                 .st8{fill:#E9EEF4;}
                 .st9{fill:#FCCA3D;}
                 .st10{fill:#F2A50C;}
                 .st11{fill:none;stroke:#FFFFFF;stroke-width:6;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;}
                 .st12{fill:none;stroke:#404242;stroke-width:1.5;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;}
                 .st13{fill:none;stroke:#373536;stroke-width:1.5;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;}
                 .st14{fill:#E4C2FF;}
                 .st15{fill:none;stroke:#686499;stroke-width:6;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;}
                 .st16{fill:#DB3E64;}
                 .st17{fill:#9B8272;}
                 .st18{fill:#EFD5BE;}
             </style>
                    <g>
                        <path class="st4" d="M79,9c24.9,0,45,20.1,45,45c0,12.3-4.9,23.4-12.9,31.5L124,99H79c-24.9,0-45-20.1-45-45S54.1,9,79,9z"/>
                        <path class="st5" d="M79,9c24.9,0,45,20.1,45,45c0,12.3-4.9,23.4-12.9,31.5L124,99H79c-24.9,0-45-20.1-45-45S54.1,9,79,9z"/>
                        <path class="st6" d="M54,29C29.1,29,9,49.1,9,74c0,12.3,4.9,23.4,12.9,31.5L9,119h45c24.9,0,45-20.1,45-45S78.9,29,54,29z"/>
                        <path class="st5" d="M54,29C29.1,29,9,49.1,9,74c0,12.3,4.9,23.4,12.9,31.5L9,119h45c24.9,0,45-20.1,45-45S78.9,29,54,29z"/>
                        <circle class="st9" cx="54" cy="74" r="28"/>
                        <g>
                            <line class="st11" x1="39" y1="74" x2="69" y2="74"/>
                            <line class="st11" x1="39" y1="64" x2="59" y2="64"/>
                            <line class="st11" x1="54" y1="84" x2="69" y2="84"/>
                            <circle class="st6" cx="39" cy="84" r="3"/>
                            <circle class="st6" cx="69" cy="64" r="3"/>
                        </g>
                    </g>
             </svg>
                Reports</a>
            <a href="request.php" class="list-group-item list-group-item-action ">
                <svg version="1.1" id="Layer_1" width="25px" height="20px" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                     viewBox="0 0 128 128" style="enable-background:new 0 0 128 128;" xml:space="preserve">
               <style type="text/css">
                   .st0{fill:#686499;}
                   .st1{fill:#EBD7FF;}
                   .st2{fill:#CFA2ED;}
                   .st3{fill:#676F77;}
                   .st4{fill:#444B54;}
                   .st5{fill:none;stroke:#444B54;stroke-width:6;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;}
                   .st6{fill:#FFFFFF;}
                   .st7{fill:#FF5576;}
                   .st8{fill:#E9EEF4;}
                   .st9{fill:#FCCA3D;}
                   .st10{fill:#F2A50C;}
                   .st11{fill:none;stroke:#FFFFFF;stroke-width:6;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;}
                   .st12{fill:none;stroke:#404242;stroke-width:1.5;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;}
                   .st13{fill:none;stroke:#373536;stroke-width:1.5;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;}
                   .st14{fill:#E4C2FF;}
                   .st15{fill:none;stroke:#686499;stroke-width:6;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;}
                   .st16{fill:#DB3E64;}
                   .st17{fill:#9B8272;}
                   .st18{fill:#EFD5BE;}
               </style>
                    <g>
                        <g>
                            <g>
                                <path class="st6" d="M54,94h50l-1.9-16.2c-0.6-5-4.9-8.8-9.9-8.8H65.9c-5.1,0-9.3,3.8-9.9,8.8L54,94z"/>
                                <path class="st5" d="M54,94h50l-1.9-16.2c-0.6-5-4.9-8.8-9.9-8.8H65.9c-5.1,0-9.3,3.8-9.9,8.8L54,94z"/>
                                <path class="st4" d="M72.7,66v3H85v-3l0,0c0-1.7-1.3-3-3-3h-6.3C74,63,72.7,64.3,72.7,66L72.7,66z"/>
                                <polyline class="st5" points="51,114 51,124 56,124 56,114 			"/>
                                <polyline class="st5" points="102,114 102,124 106,124 106,114 			"/>
                                <rect x="54" y="88.9" transform="matrix(-1 -4.478385e-11 4.478385e-11 -1 158 202.7677)" class="st4" width="50" height="25"/>
                                <rect x="79" y="88.9" class="st4" width="25" height="25"/>
                                <path class="st5" d="M54,113.9h50v-20c0-2.8-2.2-5-5-5h0c-13.3-2-26.7-2-40,0h0c-2.8,0-5,2.2-5,5V113.9z"/>
                                <path class="st3" d="M104,94L104,94c3.9,0,7,3.1,7,7v13H97v-13C97,97.1,100.1,94,104,94z"/>
                                <path class="st3" d="M54,94L54,94c3.9,0,7,3.1,7,7v13H47v-13C47,97.1,50.1,94,54,94z"/>
                                <line class="st5" x1="114" y1="114" x2="44" y2="114"/>
                                <path class="st5" d="M104,94L104,94c3.9,0,7,3.1,7,7v13H97v-13C97,97.1,100.1,94,104,94z"/>
                                <path class="st5" d="M54,94L54,94c3.9,0,7,3.1,7,7v13H47v-13C47,97.1,50.1,94,54,94z"/>
                                <circle class="st6" cx="104" cy="101" r="4"/>
                                <circle class="st6" cx="54" cy="101" r="4"/>
                            </g>
                            <path class="st6" d="M73,111h12c1.1,0,2-0.9,2-2v-7c0-4.4-3.6-8-8-8h0c-4.4,0-8,3.6-8,8v7C71,110.1,71.9,111,73,111z"/>
                        </g>
                        <g>
                            <path class="st6" d="M66,124H14c-5.5,0-10-4.5-10-10V24c0-5.5,4.5-10,10-10h52c5.5,0,10,4.5,10,10v90C76,119.5,71.5,124,66,124z"
                            />
                            <circle class="st8" cx="40" cy="113" r="4"/>
                            <path class="st5" d="M66,124H14c-5.5,0-10-4.5-10-10V24c0-5.5,4.5-10,10-10h52c5.5,0,10,4.5,10,10v90C76,119.5,71.5,124,66,124z"
                            />
                            <line class="st5" x1="66" y1="124" x2="109" y2="124"/>
                            <circle class="st4" cx="124" cy="124" r="3"/>
                            <rect x="13" y="23" class="st8" width="54" height="81"/>
                            <circle class="st6" cx="40" cy="63" r="23"/>
                            <path class="st5" d="M46.7,50.8c-1.8-1.7-4.3-2.8-7-2.8h0c-5,0-9,4-9,9V69c0,5,4,9,9,9h0c3,0,5.8-1.2,7.8-3.2"/>
                            <line class="st5" x1="25.8" y1="63" x2="41.7" y2="63"/>
                        </g>
                    </g>
               </svg>

                Request</a>
            <a href="Ride_category.php" class="list-group-item list-group-item-action ">
                <svg version="1.1" id="Layer_1" width="25px" height="20px" xmlns="http://www.w3.org/2000/svg"
                     xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 128 128"
                     style="enable-background:new 0 0 128 128;" xml:space="preserve">
                  <style type="text/css">
                      .st0 {
                          fill: #686499;
                      }

                      .st1 {
                          fill: #EBD7FF;
                      }

                      .st2 {
                          fill: #CFA2ED;
                      }

                      .st3 {
                          fill: #676F77;
                      }

                      .st4 {
                          fill: #444B54;
                      }

                      .st5 {
                          fill: none;
                          stroke: #444B54;
                          stroke-width: 6;
                          stroke-linecap: round;
                          stroke-linejoin: round;
                          stroke-miterlimit: 10;
                      }

                      .st6 {
                          fill: #FFFFFF;
                      }

                      .st7 {
                          fill: #FF5576;
                      }

                      .st8 {
                          fill: #E9EEF4;
                      }

                      .st9 {
                          fill: #FCCA3D;
                      }

                      .st10 {
                          fill: #F2A50C;
                      }

                      .st11 {
                          fill: none;
                          stroke: #FFFFFF;
                          stroke-width: 6;
                          stroke-linecap: round;
                          stroke-linejoin: round;
                          stroke-miterlimit: 10;
                      }

                      .st12 {
                          fill: none;
                          stroke: #404242;
                          stroke-width: 1.5;
                          stroke-linecap: round;
                          stroke-linejoin: round;
                          stroke-miterlimit: 10;
                      }

                      .st13 {
                          fill: none;
                          stroke: #373536;
                          stroke-width: 1.5;
                          stroke-linecap: round;
                          stroke-linejoin: round;
                          stroke-miterlimit: 10;
                      }

                      .st14 {
                          fill: #E4C2FF;
                      }

                      .st15 {
                          fill: none;
                          stroke: #686499;
                          stroke-width: 6;
                          stroke-linecap: round;
                          stroke-linejoin: round;
                          stroke-miterlimit: 10;
                      }

                      .st16 {
                          fill: #DB3E64;
                      }

                      .st17 {
                          fill: #9B8272;
                      }

                      .st18 {
                          fill: #EFD5BE;
                      }
                  </style>
                    <g>
                        <path class="st6"
                              d="M81.6,46h-35c-7.6,0-14,5.7-14.9,13.2L29,82h70l-2.5-22.7C95.6,51.7,89.2,46,81.6,46z" />
                        <path class="st8" d="M81.6,46H64v36h35l-2.5-22.7C95.6,51.7,89.2,46,81.6,46z" />
                        <rect x="29" y="76" class="st3" width="70" height="34" />
                        <rect x="64" y="76" class="st4" width="35" height="34" />
                        <g>
                            <path class="st3" d="M29,82L29,82c-5.5,0-10,4.5-10,10v18h20V92C39,86.5,34.5,82,29,82z" />
                            <path class="st3" d="M109,110V92c0-5.5-4.5-10-10-10h0c-5.5,0-10,4.5-10,10v18" />
                            <path class="st5" d="M39,110V92c0-5.5-4.5-10-10-10h0c-5.5,0-10,4.5-10,10v18" />
                            <path class="st5" d="M109,110V92c0-5.5-4.5-10-10-10h0c-5.5,0-10,4.5-10,10v18" />
                        </g>
                        <path class="st5" d="M30,76.7c22.5-3.4,45.5-3.4,68,0" />
                        <path class="st5" d="M99,82l-2.5-22.7C95.6,51.7,89.2,46,81.6,46h-35c-7.6,0-14,5.7-14.9,13.2L29,82" />
                        <polyline class="st4" points="103,110 103,124 95,124 95,110 	" />
                        <polyline class="st4" points="33,110 33,124 25,124 25,110 	" />
                        <polyline class="st5" points="103,110 103,124 95,124 95,110 	" />
                        <polyline class="st5" points="33,110 33,124 25,124 25,110 	" />
                        <line class="st5" x1="112" y1="110" x2="16" y2="110" />
                        <g>
                            <path class="st4" d="M74,43v3H54v-3v0c0-3.3,2.7-6,6-6h8C71.3,37,74,39.7,74,43L74,43z" />
                        </g>
                        <line class="st5" x1="25.4" y1="124" x2="109" y2="124" />
                        <circle class="st4" cx="124" cy="124" r="3" />
                        <path class="st6" d="M69,99.7H59c-1.7,0-3-1.3-3-3v-7h16v7C72,98.4,70.7,99.7,69,99.7z" />
                        <line class="st5" x1="56" y1="89.7" x2="72" y2="89.7" />
                        <path class="st7"
                              d="M29,90L29,90c-1.1,0-2,0.9-2,2v8c0,1.1,0.9,2,2,2h0c1.1,0,2-0.9,2-2v-8C31,90.9,30.1,90,29,90z" />
                        <path class="st7"
                              d="M99,90L99,90c-1.1,0-2,0.9-2,2v8c0,1.1,0.9,2,2,2h0c1.1,0,2-0.9,2-2v-8C101,90.9,100.1,90,99,90z" />
                    </g>
                </svg>
                Ride Categories</a>
            <a href="ride_types.php" class="list-group-item list-group-item-action ">
                <svg version="1.1" id="Layer_1" width="25px" height="20px" xmlns="http://www.w3.org/2000/svg"
                     xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 128 128"
                     style="enable-background:new 0 0 128 128;" xml:space="preserve">
                  <style type="text/css">
                      .st0 {
                          fill: #686499;
                      }

                      .st1 {
                          fill: #EBD7FF;
                      }

                      .st2 {
                          fill: #CFA2ED;
                      }

                      .st3 {
                          fill: #676F77;
                      }

                      .st4 {
                          fill: #444B54;
                      }

                      .st5 {
                          fill: none;
                          stroke: #444B54;
                          stroke-width: 6;
                          stroke-linecap: round;
                          stroke-linejoin: round;
                          stroke-miterlimit: 10;
                      }

                      .st6 {
                          fill: #FFFFFF;
                      }

                      .st7 {
                          fill: #FF5576;
                      }

                      .st8 {
                          fill: #E9EEF4;
                      }

                      .st9 {
                          fill: #FCCA3D;
                      }

                      .st10 {
                          fill: #F2A50C;
                      }

                      .st11 {
                          fill: none;
                          stroke: #FFFFFF;
                          stroke-width: 6;
                          stroke-linecap: round;
                          stroke-linejoin: round;
                          stroke-miterlimit: 10;
                      }

                      .st12 {
                          fill: none;
                          stroke: #404242;
                          stroke-width: 1.5;
                          stroke-linecap: round;
                          stroke-linejoin: round;
                          stroke-miterlimit: 10;
                      }

                      .st13 {
                          fill: none;
                          stroke: #373536;
                          stroke-width: 1.5;
                          stroke-linecap: round;
                          stroke-linejoin: round;
                          stroke-miterlimit: 10;
                      }

                      .st14 {
                          fill: #E4C2FF;
                      }

                      .st15 {
                          fill: none;
                          stroke: #686499;
                          stroke-width: 6;
                          stroke-linecap: round;
                          stroke-linejoin: round;
                          stroke-miterlimit: 10;
                      }

                      .st16 {
                          fill: #DB3E64;
                      }

                      .st17 {
                          fill: #9B8272;
                      }

                      .st18 {
                          fill: #EFD5BE;
                      }
                  </style>
                    <g>
                        <path class="st6"
                              d="M81.6,46h-35c-7.6,0-14,5.7-14.9,13.2L29,82h70l-2.5-22.7C95.6,51.7,89.2,46,81.6,46z" />
                        <path class="st8" d="M81.6,46H64v36h35l-2.5-22.7C95.6,51.7,89.2,46,81.6,46z" />
                        <rect x="29" y="76" class="st3" width="70" height="34" />
                        <rect x="64" y="76" class="st4" width="35" height="34" />
                        <g>
                            <path class="st3" d="M29,82L29,82c-5.5,0-10,4.5-10,10v18h20V92C39,86.5,34.5,82,29,82z" />
                            <path class="st3" d="M109,110V92c0-5.5-4.5-10-10-10h0c-5.5,0-10,4.5-10,10v18" />
                            <path class="st5" d="M39,110V92c0-5.5-4.5-10-10-10h0c-5.5,0-10,4.5-10,10v18" />
                            <path class="st5" d="M109,110V92c0-5.5-4.5-10-10-10h0c-5.5,0-10,4.5-10,10v18" />
                        </g>
                        <path class="st5" d="M30,76.7c22.5-3.4,45.5-3.4,68,0" />
                        <path class="st5" d="M99,82l-2.5-22.7C95.6,51.7,89.2,46,81.6,46h-35c-7.6,0-14,5.7-14.9,13.2L29,82" />
                        <polyline class="st4" points="103,110 103,124 95,124 95,110 	" />
                        <polyline class="st4" points="33,110 33,124 25,124 25,110 	" />
                        <polyline class="st5" points="103,110 103,124 95,124 95,110 	" />
                        <polyline class="st5" points="33,110 33,124 25,124 25,110 	" />
                        <line class="st5" x1="112" y1="110" x2="16" y2="110" />
                        <g>
                            <path class="st4" d="M74,43v3H54v-3v0c0-3.3,2.7-6,6-6h8C71.3,37,74,39.7,74,43L74,43z" />
                        </g>
                        <line class="st5" x1="25.4" y1="124" x2="109" y2="124" />
                        <circle class="st4" cx="124" cy="124" r="3" />
                        <path class="st6" d="M69,99.7H59c-1.7,0-3-1.3-3-3v-7h16v7C72,98.4,70.7,99.7,69,99.7z" />
                        <line class="st5" x1="56" y1="89.7" x2="72" y2="89.7" />
                        <path class="st7"
                              d="M29,90L29,90c-1.1,0-2,0.9-2,2v8c0,1.1,0.9,2,2,2h0c1.1,0,2-0.9,2-2v-8C31,90.9,30.1,90,29,90z" />
                        <path class="st7"
                              d="M99,90L99,90c-1.1,0-2,0.9-2,2v8c0,1.1,0.9,2,2,2h0c1.1,0,2-0.9,2-2v-8C101,90.9,100.1,90,99,90z" />
                    </g>
                </svg>
                Ride Types</a>

            <a href="#" class="list-group-item list-group-item-action submenu" data-toggle="collapse"
               data-target="#All_cap">
                <svg version="1.1" id="Layer_1" width="25px" height="24px" xmlns="http://www.w3.org/2000/svg"
                     xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 128 128"
                     style="enable-background:new 0 0 128 128;" xml:space="preserve">
                  <style type="text/css">
                      .st0 {
                          fill: #686499;
                      }

                      .st1 {
                          fill: #EBD7FF;
                      }

                      .st2 {
                          fill: #CFA2ED;
                      }

                      .st3 {
                          fill: #676F77;
                      }

                      .st4 {
                          fill: #444B54;
                      }

                      .st5 {
                          fill: none;
                          stroke: #444B54;
                          stroke-width: 6;
                          stroke-linecap: round;
                          stroke-linejoin: round;
                          stroke-miterlimit: 10;
                      }

                      .st6 {
                          fill: #FFFFFF;
                      }

                      .st7 {
                          fill: #FF5576;
                      }

                      .st8 {
                          fill: #E9EEF4;
                      }

                      .st9 {
                          fill: #FCCA3D;
                      }

                      .st10 {
                          fill: #F2A50C;
                      }

                      .st11 {
                          fill: none;
                          stroke: #FFFFFF;
                          stroke-width: 6;
                          stroke-linecap: round;
                          stroke-linejoin: round;
                          stroke-miterlimit: 10;
                      }

                      .st12 {
                          fill: none;
                          stroke: #404242;
                          stroke-width: 1.5;
                          stroke-linecap: round;
                          stroke-linejoin: round;
                          stroke-miterlimit: 10;
                      }

                      .st13 {
                          fill: none;
                          stroke: #373536;
                          stroke-width: 1.5;
                          stroke-linecap: round;
                          stroke-linejoin: round;
                          stroke-miterlimit: 10;
                      }

                      .st14 {
                          fill: #E4C2FF;
                      }

                      .st15 {
                          fill: none;
                          stroke: #686499;
                          stroke-width: 6;
                          stroke-linecap: round;
                          stroke-linejoin: round;
                          stroke-miterlimit: 10;
                      }

                      .st16 {
                          fill: #DB3E64;
                      }

                      .st17 {
                          fill: #9B8272;
                      }

                      .st18 {
                          fill: #EFD5BE;
                      }
                  </style>
                    <g>
                        <path class="st6"
                              d="M64,114L64,114c-16.8,0-30.5-13.7-30.5-30.5V61h61c0,0-11.9,51.1-27.1,52.8C66.3,113.9,65.1,114,64,114z" />
                        <rect x="29" y="49" class="st10" width="70" height="6" />
                        <path class="st3" d="M107,32.3L64,23l-43,9.3V41c0,4.4,3.6,8,8,8h35h35c4.4,0,8-3.6,8-8V32.3z" />
                        <path class="st18" d="M64,61l0.1,23c0,2.2,1.8,4,4,4h0l4.1,6v0c0,1.7-1.3,3.1-3,3.3h-3l0,0c-1.1,0-2.1,0.9-2.1,2.1L64,110.8
              c0,1.8,1.5,3.2,3.3,3c15.3-1.7,27.1-14.6,27.1-30.3l0-22.5H64z" />
                        <path class="st9" d="M64,52L64,52c0-1.7-1.3-3-3-3H29l0,6l32,0C62.7,55,64,53.7,64,52z" />
                        <circle class="st6" cx="50" cy="77" r="7" />
                        <path class="st4" d="M53,77c0,1.7-1.3,3-3,3s-3-1.3-3-3v-2h6V77z" />
                        <circle class="st6" cx="78" cy="77" r="7" />
                        <path class="st3" d="M84,77H44c-8.3,0-15-6.7-15-15v0v-7l70,0l0,7v0C99,70.3,92.3,77,84,77z" />
                        <path class="st4" d="M99,61H61h0c1.7,0,3,1.3,3,3v13h20c8.3,0,15-6.7,15-15L99,61z" />
                        <line class="st5" x1="54" y1="91.6" x2="74" y2="91.6" />
                        <path class="st4" d="M81,77c0,1.7-1.3,3-3,3s-3-1.3-3-3v-2h6V77z" />
                        <path class="st4" d="M107,32.3L64,23l0,0l0,20c0,3.3-2.7,6-6,6h0h41c4.4,0,8-3.6,8-8V32.3z" />
                        <g>
                            <rect x="55" y="31" class="st6" width="6" height="6" />
                            <rect x="67" y="31" class="st6" width="6" height="6" />
                        </g>
                        <g>
                            <rect x="61" y="37" class="st6" width="6" height="6" />
                        </g>
                        <rect x="29" y="55" class="st4" width="70" height="6" />
                    </g>
                </svg>
                All Captains</a>
            <div id="All_cap" class="collapse all_cap_div_colpse">
                <a href="approved.php" class="list-group-item list-group-item-action">Approved</a>
                <a href="new.php" class="list-group-item list-group-item-action ">New</a>
                <a href="rejected.php" class="list-group-item list-group-item-action ">Rejected</a>
            </div>
            <a href="#" class="list-group-item list-group-item-action submenu" data-toggle="collapse"
               data-target="#All_trip">
                <svg version="1.1" id="Layer_1" width="25px" height="20px" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                     viewBox="0 0 128 128" style="enable-background:new 0 0 128 128;" xml:space="preserve">
             <style type="text/css">
                 .st0{fill:#686499;}
                 .st1{fill:#EBD7FF;}
                 .st2{fill:#CFA2ED;}
                 .st3{fill:#676F77;}
                 .st4{fill:#444B54;}
                 .st5{fill:none;stroke:#444B54;stroke-width:6;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;}
                 .st6{fill:#FFFFFF;}
                 .st7{fill:#FF5576;}
                 .st8{fill:#E9EEF4;}
                 .st9{fill:#FCCA3D;}
                 .st10{fill:#F2A50C;}
                 .st11{fill:none;stroke:#FFFFFF;stroke-width:6;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;}
                 .st12{fill:none;stroke:#404242;stroke-width:1.5;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;}
                 .st13{fill:none;stroke:#373536;stroke-width:1.5;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;}
                 .st14{fill:#E4C2FF;}
                 .st15{fill:none;stroke:#686499;stroke-width:6;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;}
                 .st16{fill:#DB3E64;}
                 .st17{fill:#9B8272;}
                 .st18{fill:#EFD5BE;}
             </style>
                    <g>
                        <path class="st7" d="M99,124H9c-2.8,0-5-2.2-5-5V59c0-2.8,2.2-5,5-5h90c2.8,0,5,2.2,5,5v60C104,121.8,101.8,124,99,124z"/>
                        <g>
                            <path class="st16" d="M103,121H20c-1.7,0-3-1.3-3-3s1.3-3,3-3h83c1.7,0,3,1.3,3,3S104.7,121,103,121z"/>
                        </g>
                        <path class="st6" d="M73.5,112.3L50.9,104c-1.6-0.6-2.4-2.3-1.8-3.8L53.9,87c0.6-1.6,2.3-2.4,3.8-1.8l22.6,8.2
                 c1.6,0.6,2.4,2.3,1.8,3.8l-4.8,13.2C76.8,112,75,112.8,73.5,112.3z"/>
                        <path class="st6" d="M47.8,79.4l-13.2,4.8c-1.6,0.6-3.3-0.2-3.8-1.8l-3.1-8.5c-0.6-1.6,0.2-3.3,1.8-3.8l13.2-4.8
                 c1.6-0.6,3.3,0.2,3.8,1.8l3.1,8.5C50.1,77.1,49.3,78.8,47.8,79.4z"/>
                        <path class="st5" d="M99,124H9c-2.8,0-5-2.2-5-5V59c0-2.8,2.2-5,5-5h90c2.8,0,5,2.2,5,5v60C104,121.8,101.8,124,99,124z"/>
                        <line class="st5" x1="111" y1="124" x2="99" y2="124"/>
                        <circle class="st4" cx="124" cy="124" r="3"/>
                        <line class="st5" x1="19" y1="124" x2="19" y2="66.2"/>
                        <line class="st5" x1="89" y1="124" x2="89" y2="66.2"/>
                        <path class="st5" d="M41.5,45L41.5,45c0-4.4,3.6-8,8-8h9c4.4,0,8,3.6,8,8v0"/>
                        <circle class="st4" cx="19" cy="51" r="3"/>
                        <circle class="st4" cx="89" cy="51" r="3"/>
                    </g>
             </svg>
                All Trips</a>
            <div id="All_trip" class="collapse all_cap_div_colpse">
                <a href="trip_completed.php" class="list-group-item list-group-item-action  ">Completed</a>
                <a href="trip_running.php" class="list-group-item list-group-item-action ">Running</a>
                <a href="trip_cancel.php" class="list-group-item list-group-item-action ">Cancel</a>
                <a href="trip_schedule.php" class="list-group-item list-group-item-action ">Schedule</a>
            </div>

        </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">

        <nav class="navbar navbar-expand-lg navbar-light  border-bottom">
            <!-- <button class="btn btn-primary" id="menu-toggle"><span><i class="fas fa-bars"></i></span></button> -->
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-search"></i></span>
                </div>
                <input type="text" class="form-control" placeholder="Search..." aria-label="Username"
                       aria-describedby="basic-addon1">
            </div>

            <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                    <!-- <li class="nav-item active">
          <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
        </li> -->
                    <li class="nav-item">
                        <a class="nav-link" href="#"><span><i class="far fa-bell"></i></span></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle user_name" href="#" id="navbarDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="../public/image/person.jpg" alt="">
                            <div class="admin_name">
                                <h1>Austin Robertson</h1>
                                <h3>Marketing Administrator</h3>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="container">
            <!--                ../framework/main_action.php?action_type=create&request_type=products&functionality_type=insert_add_products-->
            <form id="form-main"
                  action="../framework/main_action.php?action_type=update&request_type=products&functionality_type=update_products"
                  enctype="multipart/form-data" method="POST">
                <input type="hidden" id="getid" name="product_id" value="<?php echo $_GET['id']; ?>">
                <div class="page_name_candidate">
                    <div class="candidate_div">
                        <h1>Product List</h1>

                    </div>
                    <div class="select_sort_second">
                        <div class="sort_btn">
                            <button id="btn-submit" class="brand_btn_save" type="submit">save</button>
                            <!--                            <a href="#" type="submit" >Save</a>-->
                        </div>
                    </div>
                </div>

                <div class="row pt-4 addpro_main_row ">

                    <input type="hidden" id="random-no" name="random-no" value="<?= rand(1000, 2000); ?>">
                    <input type="hidden" id="cat-id" name="cat-id">
                    <input type="hidden" id="sub-cat-id" name="sub-cat-id">
                    <input type="hidden" id="child-cat-id" name="child-cat-id">
                    <input type="hidden" id="additional-pic" name="additional-pic[]">


                    <div class="col-xl-12">
                        <div class="card shopping_add_product_card">
                            <div class="card-body">
                                <div class="row  addpro_main_row ">
                                    <div class="col-xl-12 addpro_main_heading_first">
                                        <h4>Car Information</h4>
                                    </div>
                                    <div class="col-xl-12 ">
                                        <label for="pro" class="addpro_main-input-label txt-regular color-sec">Brand Name </label>
                                        <input type="text" id="pro" name="pro" placeholder="Enter Brand Name"
                                               class="addpro_main-input car_brand_name w-100"/>
                                    </div>

                                    <div class="col-xl-12 mt-2">
                                        <label for="pro" class="addpro_main-input-label txt-regular color-sec">Car Name </label>
                                        <input type="text" id="pro" name="pro" placeholder="Enter Car Name"
                                               class="addpro_main-input car_name w-100"/>
                                    </div>
                                    <div class="col-xl-12 mt-2">
                                        <label for="pro" class="addpro_main-input-label txt-regular color-sec">Color</label>
                                        <input type="text" id="pro" name="pro" placeholder="Enter Car Name"
                                               class="addpro_main-input car_color w-100"/>
                                    </div>
                                    <div class="col-xl-12 mt-2">
                                        <label for="pro" class="addpro_main-input-label txt-regular color-sec">Number Plate</label>
                                        <input type="text" id="pro" name="pro" placeholder="Enter Car Name"
                                               class="addpro_main-input car_number_plate w-100"/>
                                    </div>
                                    <div class="col-xl-12 mt-2">
                                        <label for="pro" class="addpro_main-input-label txt-regular color-sec">Car Type</label>
                                        <input type="text" id="pro" name="pro" placeholder="Enter Car Name"
                                               class="addpro_main-input car_type w-100"/>
                                    </div>
                                    <div class="col-xl-12 mt-2">
                                        <label for="pro" class="addpro_main-input-label txt-regular color-sec">Ride Category</label>
                                        <input type="text" id="pro" name="pro" placeholder="Enter Car Name"
                                               class="addpro_main-input car_ride_category w-100"/>
                                    </div>
                                    <div class="col-xl-12 addpro_main_hr">
                                        <hr/>
                                    </div>




                                    <div class="col-xl-12">
                                        <div class="addpro_main_head_second">
                                            <h4>Adtional Images</h4>

                                            <div class="uload-card">
                                                <!--<div id="myDropzone" class="dropzone">-->

                                                <!--<div class="fallback">
                                                    <input name="file" type="file" multiple/>
                                                </div>-->

                                                <div class="dropzone needsclick dz-clickable" id="myDropzone">


                                                    <div class="dz-message needsclick" id="dmessage">


                                                        <div class="card-body upload-card-body dz-button">
                                                            <div class="upload-img">
                                                                <img name="imagess" src="../public/image/upload.png"
                                                                     alt=""/>
                                                            </div>
                                                            <div class="upload-image-format">
                                                                <p>
                                                                    .PDF .JPG .PNG .DOC
                                                                </p>
                                                            </div>
                                                            <div class="upload-detail">
                                                                <h4
                                                                    style=" font-size: 14px; font-weight: 100; margin-top: -5px;">
                                                                    You can also upload files by
                                                                </h4>
                                                                <div class="upload-clicking class=" note needsclick
                                                                "">
                                                                <a href="#" class="">Clicking here</a>
                                                            </div>
                                                        </div>
                                                    </div>


                                                </div>

                                                <!--</div>-->
                                            </div>

                                        </div>


                                    </div>




                                </div>






                            </div>
                        </div>
                    </div>

                </div>


            </form>


        </div>
    </div>
    <!-- /#page-content-wrapper -->

</div>
<!-- /#wrapper -->
<!-- modals -->
<!-- catagories modal start -->
<form class="catagories_modal_from" id="modal-form" action="">
    <div class="modal fade" id="addproduct_catogories" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header mh">
                    <button type="button" class="close closmodel" data-dismiss="modal" aria-label="Close"
                            onclick="colsemodel()">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body mb">
                    <div>
                        <div class="cat-folder-img">
                            <i class="fa fa-folder" aria-hidden="true"></i>
                        </div>
                    </div>
                    <label for="cat-name-upload"
                           class="customer-add-input-label txt-regular upload-input-label">Category
                        Name</label>

                    <input type="text" id="addpro_cat" name="addpro_cat" placeholder="Woman Clothes" value=""
                           class="customer-add-input category_name w-100"/>
                    <div>
                        <div>
                            <div class="upload-text-heading">
                                <h5 class="coupon-code-main-heading txt-regular">
                                    Upload your attachments
                                </h5>
                            </div>
                            <div>
                                <p class="upload-main-paragraph txt-label2">
                                    Drag and drop your files here
                                </p>
                            </div>
                        </div>
                        <div class="card text-center uload-card">
                            <div class="file-upload">
                                <div class="image-upload-wrap">
                                    <input class="file-upload-input" type="file" onchange="readURL(this);"
                                           accept="image/*"/>
                                    <div class="drag-text">
                                        <div class="card-body upload-card-body">
                                            <div class="upload-img">
                                                <img src="../public/image/upload.png" alt=""/>
                                            </div>
                                            <div class="upload-image-format">
                                                <p>
                                                    .PDF .JPG .PNG .DOC
                                                </p>
                                            </div>
                                            <div class="upload-detail">
                                                <h4>You can also upload files by</h4>
                                                <div class="upload-clicking">
                                                    <a href="#" class="">Clicking here</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="file-upload-content">
                                    <img class="file-upload-image" src="#" alt="your image"/>
                                    <div class="image-title-wrap">
                                        <button type="button" onclick="removeUpload()" class="btn remove-image">
                                            Remove
                                            <span class="image-title" style="display: none;">Uploaded
                                                        Image</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer mf">
                    <button type="button" onclick="addCategoryiesData()" class="btn btn-primary">
                        <img src="../public/image/tick (1).png" alt=""/>
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- catagories modal end -->
<!-- subcatgory Modal start -->
<form action="" class="subcatgory_Modal_form">
    <div class="modal fade" id="addpro_subcategories" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header mh">
                    <button type="button" class="close closmodel" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body mb">
                    <div>
                        <div class="cat-folder-img">
                            <i class="fa fa-folder" aria-hidden="true"></i>
                        </div>
                    </div>
                    <label for="addpro_subcatagory-add"
                           class="customer-add-input-label txt-regular upload-input-label">SubCategory
                        Name</label>

                    <input type="text" id="addpro_subcatagory-add" name="addpro_subcatagory-add"
                           placeholder="Woman Clothes" value=""
                           class="customer-add-input w-100 subcategory_name_class"/>

                </div>
                <div class="modal-footer mf">
                    <button type="button" onclick="addSubcategory()" class="btn btn-primary">
                        <img src="../public/image/tick (1).png" alt=""/>
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- subcatgory Modal End -->

<!-- child catagories modal start -->
<form action="" id="child_catagories_modal_form">
    <div class="modal fade" id="addpro_childcatogories" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header mh">
                    <button type="button" class="close closmodel" data-dismiss="modal" aria-label="Close"
                            onclick="colsemodel()">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body mb">
                    <div>
                        <div class="cat-folder-img">
                            <i class="fa fa-folder" aria-hidden="true"></i>
                        </div>
                    </div>
                    <label for="addpro_child_cat_input"
                           class="customer-add-input-label txt-regular upload-input-label">Category
                        Name</label>

                    <input type="text" id="addpro_child_cat_input" name="addpro_child_cat_input"
                           placeholder="Woman Clothes" value="" class="customer-add-input child_name_class w-100"/>
                    <div>
                        <div>
                            <div class="upload-text-heading">
                                <h5 class="coupon-code-main-heading txt-regular">
                                    Upload your attachments
                                </h5>
                            </div>
                            <div>
                                <p class="upload-main-paragraph txt-label2">
                                    Drag and drop your files here
                                </p>
                            </div>
                        </div>
                        <div class="card text-center uload-card">
                            <div class="file-upload">
                                <div class="image-upload-wrap">
                                    <input class="file-upload-input" type="file" onchange="readURL(this);"
                                           accept="image/*"/>
                                    <div class="drag-text">
                                        <div class="card-body upload-card-body">
                                            <div class="upload-img">
                                                <img src="../public/image/upload.png" alt=""/>
                                            </div>
                                            <div class="upload-image-format">
                                                <p>
                                                    .PDF .JPG .PNG .DOC
                                                </p>
                                            </div>
                                            <div class="upload-detail">
                                                <h4>You can also upload files by</h4>
                                                <div class="upload-clicking">
                                                    <a href="#" class="">Clicking here</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="file-upload-content">
                                    <img class="file-upload-image" src="#" alt="your image"/>
                                    <div class="image-title-wrap">
                                        <button type="button" onclick="removeUpload()" class="btn remove-image">
                                            Remove
                                            <span class="image-title" style="display: none;">Uploaded
                                                        Image</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer mf">
                    <button type="button" onclick="addChildData()" class="btn btn-primary">
                        <img src="../public/image/tick (1).png" alt=""/>
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- child catagories modal end -->
<!-- add text for product modal start -->
<form class="add_text_for_product_modal_form">
    <div class="modal fade" id="addpro_product_input" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header mh">
                    <button type="button" class="close closmodel" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body mb">
                    <div>
                        <div class="cat-folder-img">
                            <i class="fas fa-shopping-bag fsb"></i>
                        </div>
                    </div>
                    <label for="addpro_productfieldadd"
                           class="customer-add-input-label txt-regular upload-input-label">Add Product</label>

                    <input type="text" id="addpro_productfieldadd" name="addpro_subcatagory-add"
                           placeholder="Product Name" value="" class="customer-add-input w-100"/>

                </div>
                <div class="modal-footer mf">
                    <button type="button" onclick="productfieldadd()" class="btn btn-primary">
                        <img src="../public/image/tick (1).png" alt=""/>
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- add text for product modal end -->

<!-- add text for edit modal start -->
<form action="" class="add_text_for_edit_modal_form">
    <div class="modal fade" id="addpro_product_input_edit" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header mh">
                    <button type="button" class="close closmodel" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body mb">
                    <div>
                        <div class="cat-folder-img">
                            <i class="fas fa-shopping-bag fsb"></i>
                        </div>
                    </div>
                    <label for="addpro_productfilededit"
                           class="customer-add-input-label txt-regular upload-input-label">Add Product</label>

                    <input type="text" id="addpro_productfilededit" name="addpro_productfilededit"
                           placeholder="Product Name" value="" class="customer-add-input w-100"/>
                    <input type="hidden" id="addpro_productfilededit2" name="addpro_productfilededit2"
                           placeholder="Product Name" value="" class="customer-add-input w-100"/>

                </div>
                <div class="modal-footer mf">
                    <button type="button" onclick="" class="btn btn-primary updatefun">
                        <img src="../public/image/tick (1).png" alt=""/>
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- add text for edit modal end -->
<!-- add text for add modal start -->
<form action="" id="addpro_addfieldtag_id" class="add_text_for_add_modal_form">
    <div class="modal fade" id="addpro_addfieldtag" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header mh">
                    <button type="button" class="close closmodel" data-dismiss="modal" aria-label="Close"
                            onclick="colsemodel()">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body mb">
                    <div>
                        <div class="cat-folder-img">
                            <i class="fas fa-shopping-bag fsb"></i>
                        </div>
                    </div>
                    <label for="addpro_addtag_input_name"
                           class="customer-add-input-label txt-regular addpro-input-label">Name</label>

                    <input type="text" id="addpro_addtag_input_name" name="addpro_addtag_input_name"
                           placeholder="Woman Clothes" value="" class="customer-add-input w-100"/>
                    <div style="margin-top: 11px;">
                        <p class="upload-main-paragraph txt-label2">
                            Upto 10 Character Allow
                        </p>
                    </div>
                    <label for="addpro_addtag_input_price" style="margin-top: 14px;"
                           class="customer-add-input-label txt-regular addpro-input-label">Price</label>

                    <input type="text" id="addpro_addtag_input_price" name="addpro_addtag_input_price"
                           placeholder="Woman Clothes" value="" class="customer-add-input w-100"/>
                    <div id="hideimage">
                        <div>
                            <div class="upload-text-heading">
                                <h5 class="coupon-code-main-heading txt-regular">
                                    Upload your attachments
                                </h5>
                            </div>
                            <div>
                                <p class="upload-main-paragraph" style="font-size:10px;">
                                    Drag and drop your files here
                                </p>
                            </div>
                        </div>
                        <div class="card text-center uload-card">
                            <div class="file-upload">
                                <div class="image-upload-wrap">
                                    <input class="file-upload-input" type="file" onchange="readURL(this);"
                                           accept="image/*"/>
                                    <div class="drag-text">
                                        <div class="card-body upload-card-body">
                                            <div class="upload-img">
                                                <img src="../public/image/upload.png" alt=""/>
                                            </div>
                                            <div class="upload-image-format">
                                                <p>
                                                    .PDF .JPG .PNG .DOC
                                                </p>
                                            </div>
                                            <div class="upload-detail">
                                                <h4>You can also upload files by</h4>
                                                <div class="upload-clicking">
                                                    <a href="#" class="">Clicking here</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="file-upload-content">
                                    <img class="file-upload-image addpro_addimage_tag" src="#"
                                         alt="your image"/>
                                    <div class="image-title-wrap">
                                        <button type="button" onclick="removeUpload()" class="btn remove-image">
                                            Remove
                                            <span class="image-title" style="display: none;">Uploaded
                                                        Image</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="custom-controlm custom-switchm">
                        <input type="checkbox" class="custom-control-input" id="customSwitch4" checked>
                        <label class="custom-control-label" for="customSwitch4"></label>Required image
                    </div>
                </div>
                <div class="modal-footer mf">
                    <button type="button" onclick="addprotag()" class="btn btn-primary">
                        <img src="../public/image/tick (1).png" alt=""/>
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- add text for add modal start -->
<!-- add tagupdate for modal start -->
<form action="" class="add_tagupdate_for_modal_form">
    <div class="modal fade" id="addpro_addfieldtag_update" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header mh">
                    <button type="button" class="close closmodel" data-dismiss="modal" aria-label="Close"
                            onclick="colsemodel()">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body mb">
                    <div>
                        <div class="cat-folder-img">
                            <i class="fas fa-shopping-bag fsb"></i>
                        </div>
                    </div>
                    <label for="addpro_addtag_input_name_update"
                           class="customer-add-input-label txt-regular addpro-input-label">Name</label>

                    <input type="text" id="addpro_addtag_input_name_update"
                           name="addpro_addtag_input_name_update" placeholder="Woman Clothes" value=""
                           class="customer-add-input w-100"/>
                    <div style="margin-top: 11px;">
                        <p class="upload-main-paragraph" style="font-size:10px;">
                            Upto 10 Character Allow
                        </p>
                    </div>
                    <input type="hidden" id="addpro_addtag_input_name_update2"
                           name="addpro_addtag_input_name_update2" placeholder="Woman Clothes" value=""
                           class="customer-add-input w-100"/>
                    <label for="addpro_addtag_input_price_update" style="margin-top: 14px;"
                           class="customer-add-input-label txt-regular addpro-input-label">Price</label>

                    <input type="text" id="addpro_addtag_input_price_update"
                           name="addpro_addtag_input_price_update" placeholder="Woman Clothes" value=""
                           class="customer-add-input w-100"/>

                    <div id="hideimage2">
                        <div>
                            <div class="upload-text-heading">
                                <h5 class="coupon-code-main-heading txt-regular">
                                    Upload your attachments
                                </h5>
                            </div>
                            <div>
                                <p class="upload-main-paragraph txt-label2">
                                    Drag and drop your files here
                                </p>
                            </div>
                        </div>
                        <div class="card text-center uload-card">
                            <div class="file-upload">
                                <div class="image-upload-wrap">
                                    <input class="file-upload-input" type="file" onchange="readURL(this);"
                                           accept="image/*"/>
                                    <div class="drag-text">
                                        <div class="card-body upload-card-body">
                                            <div class="upload-img">
                                                <img src="../public/image/upload.png" alt=""/>
                                            </div>
                                            <div class="upload-image-format">
                                                <p>
                                                    .PDF .JPG .PNG .DOC
                                                </p>
                                            </div>
                                            <div class="upload-detail">
                                                <h4>You can also upload files by</h4>
                                                <div class="upload-clicking">
                                                    <a href="#" class="">Clicking here</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="file-upload-content">
                                    <img class="file-upload-image" src="#" alt="your image"/>
                                    <div class="image-title-wrap">
                                        <button type="button" onclick="removeUpload()" class="btn remove-image">
                                            Remove
                                            <span class="image-title" style="display: none;">Uploaded
                                                        Image</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="custom-controlm custom-switchm">
                        <input type="checkbox" class="custom-control-input" id="customSwitch5" checked>
                        <label class="custom-control-label" for="customSwitch5"></label>Required image
                    </div>
                </div>
                <div class="modal-footer mf">
                    <button type="button" class="btn btn-primary updtag">
                        <img src="../public/image/tick (1).png" alt=""/>
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- add tagupdate for modal start -->
<?php
$car_id = $_GET['carid'];
$cardoc_id = $_GET['cardoc_id'];

?>
<input type="hidden" id="carinput-pic-id" value="<?=$car_id?>">
<input type="hidden" id="cardocinput-pic-id" value="<?=$cardoc_id?>">

<!-- Bootstrap core JavaScript -->
<script src="../vendor/jquery/jquery.min.js"></script>
<script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script src="../public/js/jquery.tag.js"></script>
<script src="../public/js/jquery.tagsinput-revisited.js"></script>
<script src="../public/js/dropzone.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
<script src="../public/js/customjs.js"></script>
<script src="../public/js/custom_request.js"></script>
<script src="../public/js/customPagination.js"></script>
<!-- Menu Toggle Script -->

<script>

    var dresult;
    // var parameter="";
    // console.log("yes this is"+$("#carinput-pic-id").val());
    // setTimeout(function(){
    //     parameter = $("#carinput-pic-id").val()
    // }, 1000);

    Dropzone.options.myDropzone = {
        url: '../framework/main_action.php?action_type=create&request_type=specific_captain&functionality_type=insert_picture&id=' + $("#carinput-pic-id").val(),
        autoProcessQueue: true,
        uploadMultiple: true,
        parallelUploads: 5,
        maxFiles: 5,
        maxFilesize: 1,
        addRemoveLinks: true,
        acceptedFiles: 'image/*',
        previewTemplate: `<div class="dz-preview dz-file-preview">

                      <div class="dz-image"><img data-dz-thumbnail /></div>
                      <div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress></span></div>

                      <div class="dz-error-message"><span data-dz-errormessage></span></div>
                      <div class="dz-error-message"><i class="fa fa-warning">&nbsp;</i><span data-dz-errormessage></span></div>
                      <div class="dz-filename"><span data-dz-name></span></div>
                      <div class="dz-progress">
                        <span class="dz-upload" data-dz-uploadprogress></span>
                      </div>
                      <div class="dz-remove">
                                <a href="javascript:undefined;" data-dz-remove=""style="color:red;" >Delete</a>
                            <div>

                            </div>
                       </div>
                    </div>
                        `,

        init: function () {

            dzClosure = this; // Makes sure that 'this' is understood inside the functions below.

            // for Dropzone to process the queue (instead of default form behavior):
            /*document.getElementById("btn-submit").addEventListener("click", function(e) {
                // Make sure that the form isn't actually being sent.
                e.preventDefault();
                e.stopPropagation();
                dzClosure.processQueue();

            });*/

            var captains_id = $("#driver-detail-id").val();
            sendRequest("?action_type=retrieve&request_type=specific_captain&functionality_type=retrieve_specific_captain", {
                captain_id: captains_id,


            }, "POST")
                .then((data) => {
                    console.log("Product Picture = " + data)
                    var responseObject = JSON.parse(data);

                    // console.log("Last Insert ID = "+responseObject.id);
                    // console.log("Successfully Positioned " + data);
                    if (responseObject.code == "202") {
                        var result = responseObject.listOfData;
                        for (var i = 0; i < result.length; i++) {
                            var car_number_plate = result[i].car_number_plate;

                            var ride_type_name = result[i].ride_type_name;
                            var ride_category = result[i].ride_category;
                            var car_brand_name = result[i].car_brand_name;
                            var car_name = result[i].car_name;
                            var car_colour = result[i].car_colour;
                            var car_pic_id = result[i].car_pic_id;
                            $("#carinput-pic-id").val(car_pic_id);
                            // alert("this is car pic id"+ car_pic_id);
                            var car_docsments_id = result[i].car_docsments_id;
                            $("#cardocinput-pic-id").val(car_docsments_id);
                            $(".car_brand_name").val(car_brand_name);
                            $(".car_color").val(car_colour);
                            $(".car_name").val(car_name);
                            $(".car_type").val(ride_type_name);
                            $(".car_ride_category").val(ride_category);
                            $(".car_number_plate").val(car_number_plate);


                            var car_pictures = result[i].car_pictures;
                            for(var d_pic = 0; d_pic < car_pictures.length; d_pic++ ){
                                var n = car_pictures[d_pic].id;
                                var path = "../public/uploads/driver_detail_pic/"+car_pictures[d_pic].picture;
                                var mockFile = {
                                    name: name,
                                    id: n,
                                    type: 'image/jpeg',
                                    status: Dropzone.ADDED
                                };

                                ////let mockFile = { name: "Filename 2", size: 12345 };
                                dzClosure.displayExistingFile(mockFile, path);
                            }



                        }

                    }
                })
                .catch((error) => {
                    console.log(error)
                })

            dzClosure.on("success", function (file, response) {
                $("#dmessage").hide();

                var _this = this;
                console.log("sucesso" + response + " file  data:" + file.name);
                var data = JSON.parse(response);
                dresult = data.listOfData;
                console.log(dresult);


            });

            dzClosure.on("removedfile", function (file) {
                var numItems = $('.dz-preview').length;
                if(numItems == '0'){
                    $("#dmessage").show();
                }else {
                    $("#dmessage").hide();
                }



                // if ($("#myDropzone").find("dz-preview")) {
                //     $("#dmessage").hide();
                //
                // }



                console.log("File REmoved Successfully = " + file.name + " file = " + file.id);
                if (file.id == undefined) {


                    for (var i = 0; i < dresult.length; i++) {


                        var n = dresult[i].id;
                        var name = dresult[i].name;
                        if (file.name == name) {
                            console.log("Data  Id = " + dresult[i].id + " Name = " + dresult[i].name);
                            sendRequest("?action_type=delete&request_type=specific_captain&functionality_type=delete_car_pic", {
                                id: n,


                            }, "POST")
                                .then((data) => {
                                    console.log(data)
                                    var data = JSON.parse(data);
                                    console.log("Successfully Delete " + data);


                                })
                                .catch((error) => {
                                    console.log(error)
                                })

                        }


                    }

                }
                else {


                    sendRequest("?action_type=delete&request_type=specific_captain&functionality_type=delete_car_pic", {
                        id: file.id,


                    }, "POST")
                        .then((data) => {
                            console.log(data)
                            var data = JSON.parse(data);
                            console.log("Successfully Delete " + data);



                        })
                        .catch((error) => {
                            console.log(error)
                        })

                }


                ///$('#form-main').trigger('submit');
            });

        }

        //send all the form data along with the files:


    }

    


</script>


<script>

    // $(document).ready(function () {
    //     retrieveallSpcificCaptain();
    //     // retrieve_specific_captain_rides();
    //     // var str = "foo/bar/test.html";
    //     // var lastSlash = str.lastIndexOf("/");
    //     // alert(str.substring(lastSlash+1));
    //
    //     function retrieveallSpcificCaptain() {
    //         var captains_id = $("#driver-detail-id").val();
    //         // alert(captains_id);
    //         sendRequest("?action_type=retrieve&request_type=specific_captain&functionality_type=retrieve_specific_captain", {
    //
    //             captain_id: captains_id,
    //             // country_id:country_id,
    //             // city_id:city_id,
    //             // status:0,
    //
    //         }, "POST")
    //             .then((data) => {
    //                 var data = JSON.parse(data);
    //                 if (data.code == "202") {
    //                     // $(".pagination").html(data.pagination);
    //                     // $("#captain-table-body-id").empty();
    //                     var list = data.listOfData;
    //
    //                     for (var i = 0; i < list.length; i++) {
    //
    //                         var n = list[i].id;
    //                         var name = list[i].name;
    //                         var cap_pic = list[i].cap_pic;
    //                         var email = list[i].email;
    //                         var phone = list[i].phone;
    //                         var address = list[i].address;
    //                         var car_number_plate = list[i].car_number_plate;
    //
    //                         var ride_type_name = list[i].ride_type_name;
    //                         var ride_category = list[i].ride_category;
    //                         var car_brand_name = list[i].car_brand_name;
    //                         var car_name = list[i].car_name;
    //
    //
    //
    //
    //                         var total_revenue = list[i].total_revenue;
    //                         var total_trips = list[i].total_trips;
    //                         var avg_rating = list[i].avg_rating;
    //                         var status = list[i].status;
    //                         var car_colour = list[i].car_colour;
    //                         var bank_id = list[i].bank_id;
    //
    //
    //                         var driving_license = list[i].driving_license;
    //                         var driving_license_picture = list[i].driving_license_picture;
    //                         var driving_license_status = list[i].driving_license_status;
    //                         var driving_license_registration_no = list[i].driving_license_registration_no;
    //                         var driving_license_date_of_issue = list[i].driving_license_date_of_issue;
    //                         var driving_license_date_of_expiry = list[i].driving_license_date_of_expiry;
    //
    //                         var national_identity_card = list[i].national_identity_card;
    //                         var national_identity_card_picture = list[i].national_identity_card_picture;
    //                         var national_identity_card_status = list[i].national_identity_card_status;
    //                         var national_identity_card_registration_no = list[i].national_identity_card_registration_no;
    //                         var national_identity_card_date_of_issue = list[i].national_identity_card_date_of_issue;
    //                         var national_identity_card_date_of_expiry = list[i].national_identity_card_date_of_expiry;
    //
    //                         var car_pictures_name = list[i].car_pictures_name;
    //                         var car_pictures = list[i].car_pictures;
    //                         var car_pictures_status = list[i].car_pictures_status;
    //
    //                         var car_documents = list[i].car_documents;
    //                         var car_documents_pictures = list[i].car_documents_pictures;
    //                         var car_documents_status = list[i].car_documents_status;
    //
    //
    //                         var bank_name = list[i].bank_name;
    //                         var branch_code = list[i].branch_code;
    //                         var account_holder_name = list[i].account_holder_name;
    //                         var account_no = list[i].account_no;
    //                         var iban_no = list[i].iban_no;
    //                         var cheque_picture = list[i].cheque_picture;
    //
    //                         var date_created = list[i].date_created;
    //                         var enable = list[i].enable;
    //
    //
    //
    //
    //                         $(".car_brand_name").text(car_brand_name);
    //                         $(".car_color").text(car_colour);
    //                         $(".car_name").text(car_name);
    //                         $(".car_type").text(ride_type_name);
    //                         $(".car_ride_category").text(ride_category);
    //                         $(".car_number_plate").text(car_number_plate);
    //                         // $("#cap-car-modal").text(car_brand_name+","+car_name);
    //
    //                         // // docnument info attachments
    //                         //
    //                         // var st_checked = "";
    //                         // if (driving_license_status == 0) {
    //                         //
    //                         //     st_checked = "";
    //                         // } else {
    //                         //
    //                         //     st_checked = "Style='background: red;'";
    //                         // }
    //                         //
    //                         // console.log(driving_license_picture[0].id);
    //                         // $(".doc_detail_attach").empty();
    //                         // for(var d_pic = 0; d_pic < driving_license_picture.length; d_pic++ ){
    //                         //     var d=driving_license_picture[d_pic];
    //                         //     var text=" <div class=\"first_attachment\" id=\"licence-pic-"+d.id+"\">\n" +
    //                         //         "                                       <a href=\"../public/uploads/driver_detail_pic/"+d.picture+"\" id=\"licence-path-"+d.id+"\" alt=\"Image description\" target=\"_blank\">  <span class=\"span_img\" "+st_checked+"><i class=\"fas fa-paperclip\"></i></span><span class=\"span_text\">"+d.picture+"</span></a>  <span class=\"span_icon\"  onclick=\"deleteDocments("+d.id+");\"><i class=\"fas fa-times\"></i></span>\n" +
    //                         //
    //                         //         "                                    </div>";
    //                         //     $(".doc_detail_attach ").append(text);
    //                         // }
    //                         //
    //                         // // Cnic info attachments
    //                         //
    //                         // var national_status = "";
    //                         // if (national_identity_card_status == 0) {
    //                         //
    //                         //     national_status = "";
    //                         // } else {
    //                         //
    //                         //     national_status = "Style='background: red;'";
    //                         // }
    //                         //
    //                         // console.log(national_identity_card_picture[0].picture);
    //                         // $(".cnic_attachment").empty();
    //                         // for(var d_pic = 0; d_pic < national_identity_card_picture.length; d_pic++ ){
    //                         //     var d=national_identity_card_picture[d_pic];
    //                         //     var text=" <div class=\"first_attachment\" id=\"cnic-pic-"+d.id+"\">\n" +
    //                         //         "                                      <a href=\"../public/uploads/driver_detail_pic/"+d.picture+"\" id=\"cnic-path-"+d.id+"\" alt=\"Image description\" target=\"_blank\">  <span class=\"span_img\" "+national_status+"><i class=\"fas fa-paperclip\"></i></span><span class=\"span_text\">"+d.picture+"</span></a>  <span class=\"span_icon\" onclick=\"deleteCnic("+d.id+");\"><i class=\"fas fa-times\"></i></span>\n" +
    //                         //         "                                    </div>";
    //                         //     $(".cnic_attachment ").append(text);
    //                         // }
    //                         //
    //                         // // Bank detail  attachments
    //                         // if(cheque_picture == null){
    //                         //     $(".bankdetail_attach").empty();
    //                         // }
    //                         // else {
    //                         //     $(".bankdetail_attach").empty();
    //                         //
    //                         //     // var d=national_identity_card_picture[d_pic];
    //                         //     var text="<div class=\"first_attachment\" id=\"licence\">\n" +
    //                         //         "                                        <a href=\"../public/uploads/driver_detail_pic/"+cheque_picture+"\" class=\"check_pic\" id=\"bank-detail-path-"+bank_id+"\" alt=\"Image description\" target=\"_blank\"> <span class=\"span_img\"><i class=\"fas fa-paperclip\"></i></span><span class=\"span_text\">"+cheque_picture+"</span></a>  <span class=\"span_icon\" onclick=\"deleteBankPic("+bank_id+")\"><i class=\"fas fa-times\"></i></span>\n" +
    //                         //         "                                    </div>";
    //                         //     $(".bankdetail_attach").append(text);
    //                         // }
    //                         //
    //                         //
    //                         //
    //                         //
    //                         //
    //                         // // Car info attachments
    //                         //
    //                         // var car_status = "";
    //                         // if (car_pictures_status == 0) {
    //                         //
    //                         //     car_status = "";
    //                         // } else {
    //                         //
    //                         //     car_status = "Style='background: red;'";
    //                         // }
    //                         //
    //                         // console.log(car_pictures[0].picture);
    //                         // $(".car_detail_Attachments").empty();
    //                         // for(var d_pic = 0; d_pic < car_pictures.length; d_pic++ ){
    //                         //     var d=car_pictures[d_pic];
    //                         //     var text="<div class=\"first_attachment\" id=\"car-pic-"+d.id+"\">\n" +
    //                         //         "                                       <a href=\"../public/uploads/driver_detail_pic/"+d.picture+"\" id=\"car-info-path-"+d.id+"\" alt=\"Image description\" target=\"_blank\">   <span class=\"span_img\" "+car_status+"><i class=\"fas fa-paperclip\"></i></span><span class=\"span_text\">"+d.picture+"</span> </a> <span class=\"span_icon\" onclick=\"deleteCardAtach("+d.id+");\"><i class=\"fas fa-times\"></i></span>\n" +
    //                         //         "                                    </div>";
    //                         //     $(".car_detail_Attachments ").append(text);
    //                         // }
    //                         //
    //                         //
    //                         // // Car doc info attachments
    //                         //
    //                         // var car_doc_status = "";
    //                         // if (car_documents_status == 0) {
    //                         //
    //                         //     car_doc_status = "";
    //                         // } else {
    //                         //
    //                         //     car_doc_status = "Style='background: red;'";
    //                         // }
    //                         //
    //                         // console.log(car_documents_pictures[0].picture);
    //                         // $(".car_doc").empty();
    //                         // for(var d_pic = 0; d_pic < car_documents_pictures.length; d_pic++ ){
    //                         //     var d=car_documents_pictures[d_pic];
    //                         //     var text="<div class=\"first_attachment\" id=\"car-doc-pic-"+d.id+"\">\n" +
    //                         //         "                                       <a href=\"../public/uploads/driver_detail_pic/"+d.picture+"\" id=\"car-doc-info-path-"+d.id+"\" alt=\"Image description\" target=\"_blank\">   <span class=\"span_img\" "+car_status+"><i class=\"fas fa-paperclip\"></i></span><span class=\"span_text\">"+d.picture+"</span> </a> <span class=\"span_icon\" onclick=\"deleteCardAtach("+d.id+");\"><i class=\"fas fa-times\"></i></span>\n" +
    //                         //         "                                    </div>";
    //                         //     $(".car_doc").append(text);
    //                         // }
    //
    //
    //
    //
    //                     }
    //
    //
    //
    //                 } else if (data.code == "206") {
    //                     console.log("Failed to Delete");
    //                 }
    //
    //             })
    //             .catch((error) => {
    //                 console.log(error)
    //             });
    //     }
    //
    //
    //
    // });
</script>


</body>

</html>
