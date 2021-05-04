<!DOCTYPE html>
 <html lang="en">
 
 <head>
   <meta charset="utf-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <link rel="apple-touch-icon" sizes="76x76" href="assets/img/custom/favicon.png">
   <link rel="icon" type="image/png" href="assets/img/custom/favicon.png">
   <title>
     Abia Tech Hub • Contact
   </title>
   <!--     Fonts and icons     -->
   <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet" />
   <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
   <!-- Nucleo Icons -->
   <link href="assets/css/nucleo-icons.css" rel="stylesheet" />
   <!-- CSS Files -->
   <link href="assets/css/blk-design-system.css?v=1.0.0" rel="stylesheet" />
   <!-- CSS Just for demo purpose, don't include it in your project -->
   <link href="assets/demo/demo.css" rel="stylesheet" />
   
    <script src="assets/js/vue.min.js"></script>
    <script src="assets/js/axios.min.js"></script>
 </head>
 
 <body class="landing-page">
  
   <div class="wrapper">  
    <section class="section">
      <div class="container">
        <div class="row">
          <div class="col-md-8">
            <div class="card card-plain">
              <div class="row card-header">
                <h5 class="text-on-back">CONTACT</h5>
              </div>
              <div class="card-body" id="app">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Your Name</label>
                        <input required name="fullname" v-model='contact.fullname' type="text" class="form-control" placeholder="Mike">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Email address</label>
                        <input required name="email" v-model='contact.email' type="email" class="form-control" placeholder="example@email.com">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Phone</label>
                        <input required name="phone" v-model='contact.phone' type="text" class="form-control" placeholder="+2348100000000">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Company</label>
                        <input required name="company" v-model='contact.company' type="text" class="form-control" placeholder="Your company">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Message</label>
                        <input required name="message" v-model='contact.message' type="text" class="form-control" placeholder="Hello there!">
                      </div>
                    </div>
                  </div>
                <div class="text-danger" v-html="successMSG.message"> </div>
                  <button type="submit" @click="SendMessage" class="btn btn-primary btn-round float-right" rel="tooltip" data-original-title="Can't wait for your message" data-placement="right">Send</button>
              </div>
            </div>
          </div>
          <div class="col-md-3 ml-auto">
            <div class="info info-horizontal">
              <div class="icon icon-primary">
                <i class="tim-icons icon-square-pin"></i>
              </div>
              <div class="description">
                <h4 class="info-title">Find us at the office</h4>
                <p> No 6 Warri Street, Umuahia,
                  <br> Abia State,
                  <br> Nigeria.
                </p>
              </div>
            </div>
            <div class="info info-horizontal">
              <div class="icon icon-primary">
                <i class="tim-icons icon-mobile"></i>
              </div>
              <div class="description">
                <h4 class="info-title">Give us a ring</h4>
                <p> Sunny-Prince Faithful
                  <br> +234 805 274 9600
                  <br> Mon - Fri, 8:00-17:00
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
     
   </div>
   
 </body>
 
 </html>
 