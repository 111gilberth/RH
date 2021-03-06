<!DOCTYPE html>
<html>
      <head>
              <style>
                      .onoffswitch {
                          position: relative; width: 90px;
                          -webkit-user-select:none; -moz-user-select:none; -ms-user-select: none;
                      }
                      .onoffswitch-checkbox {
                          display: none;
                      }
                      .onoffswitch-label {
                          display: block; overflow: hidden; cursor: pointer;
                          border: 2px solid #7f7f7f; border-radius: 20px;
                      }
                      .onoffswitch-inner {
                          display: block; width: 200%; margin-left: -100%;
                          transition: margin 0.5s ease-in 0s;
                      }
                      .onoffswitch-inner:before, .onoffswitch-inner:after {
                          display: block; float: left; width: 50%; height: 30px; padding: 0; line-height: 30px;
                          font-size: 14px; color: white; font-family: Trebuchet, Arial, sans-serif; font-weight: bold;
                          box-sizing: border-box;
                      }
                      .onoffswitch-inner:before {
                          content: "SI";
                          padding-left: 10px;
                          background-color: #ccffcc; color: #999999;
                      }
                      .onoffswitch-inner:after {
                          content: "NO";
                          padding-right: 10px;
                          background-color: #ffe5e5; color: #999999 ;
                          text-align: right;
                      }
                      .onoffswitch-switch {
                          display: block; width: 23px; margin: 3.5px;
                          background: #ff1919;
                          position: absolute; top: 0; bottom: 0;
                          right: 56px;
                          border: 2px solid #7f7f7f; border-radius: 20px;
                          transition: all 0.3s ease-in 0s; 
                      }
                      .onoffswitch-checkbox:checked + .onoffswitch-label .onoffswitch-inner {
                          margin-left: 0;
                      }
                      .onoffswitch-checkbox:checked + .onoffswitch-label .onoffswitch-switch {
                          right: 0px; 
                          background-color: #00ff00; 
                      }
              </style>
    </head>
    <body>

                    <center>

                    <div class="onoffswitch">
                        <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="myonoffswitch" checked>
                        <label class="onoffswitch-label" for="myonoffswitch">
                            <span class="onoffswitch-inner"></span>
                            <span class="onoffswitch-switch"></span>
                        </label>
                    </div>

                    <center>

    </body>

</html>