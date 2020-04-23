<?php
session_start();

if (isset($_SESSION['loggedIn'])) {
  header("Location: userDashboard.php");
  exit();
}
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="" />
  <link rel="stylesheet" href="">
  <title>Furniture Emporium - Sign Up</title>
  <meta name="description" content="User Signup Page!">
  <meta name="keywords" content="Register, Signup, Create Account">
  <!-- REACT is JavaScript library created by Facebook used for building Web Apps -->
  <script src="https://unpkg.com/react@16/umd/react.production.min.js"></script>
  <script src="https://unpkg.com/react-dom@16/umd/react-dom.production.min.js"></script>
  <script src="https://unpkg.com/babel-standalone@6.15.0/babel.min.js"></script>

</head>

<body>
  <?php include "components/navbar.php"; ?>
  <div id="root"></div>

  <script type="text/babel">

    class LoginForm extends React.Component {
  constructor(props) {
    super(props);
    this.state = {
      name: '',
      phoneNumber: '',
      emailID: '',
      password: '',
      passwordRepeat: '',
      errorMsgname: '',
      errorMsgPhone: '',
      errorMsgEmail: '',
      errorMsgPassword: ''
    };
  }

  handleChange = (event) => {
      let name = event.target.name;
      let value = event.target.value;
      //
      // Name Validation
      if (name == "name") {
        if (value =="") {
            this.setState({errorMsgName: <strong>Your name should not be empty</strong>});
        } else if (value !="") {
            var iChars = "!@#$%^&*()+=-[]\\\';,./{}|\":<>?0123456789";	
            var textval = value;
            var errorCount = 0;
		    for (var i = 0; i < value.length; i++) {
			    if (iChars.indexOf(textval.charAt(i)) != -1) {
				    errorCount = errorCount + 1;
                }
            }
            if (errorCount > 0) {
                this.setState({errorMsgName: <strong>Your name has special characters, these are not allowed. Please remove them and try again.</strong>});
            } else {
                this.setState({errorMsgName: <strong>Your name is valid!</strong>});
            }
        }
// Phone Number Validation
      } else if (name === "phoneNumber") {
        if ((value !="" && !Number(value)) || (value.length>=12)){
            this.setState({errorMsgPhone: <strong>Your phone number should only be numerics between 0 to 9 and the it should not exceed 11 digits in total</strong>});
        } else if (value =="") {
            this.setState({errorMsgPhone: <strong>Your phone number should not be empty</strong>});
        } else {
            this.setState({errorMsgPhone: <strong>Your phone number is valid!</strong>});
        }
// Email Validation
    } else if (name == "emailID") {
        const emailRegEx = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        if ((emailRegEx.test(value) == false) && (value != "")) {
            this.setState({errorMsgEmail: <strong>Your email address is invalid!</strong>});
        } else if  (value == "") {
            this.setState({errorMsgEmail: <strong>Your email address is empty!</strong>});
        } else if (emailRegEx.test(value) == true) {
            this.setState({errorMsgEmail: <strong>Your email address is valid!</strong>});
        }
// Set final state
} 
      //
      this.setState({
      [name]: value,
    });
  };

  handleSubmit = event => {
  const { name, phoneNumber, emailID, password} = this.state;
  //
  var nameValidate = "";
    var phoneValidate = "";
    var emailValidate = "";
//
      // Name Validation
        if (name =="") {
          nameValidate = "FALSE";
        } else if (name !="") {
            var iChars = "!@#$%^&*()+=-[]\\\';,./{}|\":<>?0123456789";	
            var textval = name;
            var errorCount = 0;
		    for (var i = 0; i < name.length; i++) {
			    if (iChars.indexOf(textval.charAt(i)) != -1) {
				    errorCount = errorCount + 1;
                }
            }
            if (errorCount > 0) {
              nameValidate = "FALSE";
            } else {
              nameValidate = "TRUE";
            }
        }
// Phone Number Validation
        if ((phoneNumber !="" && !Number(phoneNumber)) || (phoneNumber.length>=12)){
          phoneValidate = "FALSE";
        } else if (phoneNumber =="") {
          phoneValidate = "FALSE";
        } else {
          phoneValidate = "TRUE";
        }
// Email Validation
        const emailRegEx = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        if ((emailRegEx.test(emailID) == false) && (emailID != "")) {
          emailValidate = "FALSE";
        } else if  (emailID == "") {
          emailValidate = "FALSE";
        } else if (emailRegEx.test(emailID) == true) {
          emailValidate = "TRUE";
        }
// Set final state

// Set final state
  //
  if ((nameValidate == "TRUE") && (phoneValidate == "TRUE") && (emailValidate == "TRUE")) {
  var httpxml;
    try  {
      // Firefox, Chrome, Opera 8.0+, Safari
      httpxml=new XMLHttpRequest();
    }
    catch (e)  {
      // Internet Explorer
      try    {
        httpxml=new ActiveXObject("Msxml2.XMLHTTP");
      }
    catch (e)    {
        try      {
        httpxml=new ActiveXObject("Microsoft.XMLHTTP");
        }
      catch (e)      {
      alert("Your browser does not support AJAX!");
        return false;
        }
      }
    }
      var MyVariable = `name=${name}&phoneNumber=${phoneNumber}&emailID=${emailID}&password=${password}`;
      httpxml.open("POST","./databaseConfig/signup.php?"+MyVariable,true);
      console.log(MyVariable);
      httpxml.send();
  } else {
    <?php
    $_SESSION['signupError'] = TRUE;
    ?>
  }
  };

  render() {
    return (
      <div class="container">
  <div class="row">
  <div class="col-sm-1">
      </div>
  <div class="col-sm-10" align="center">
      <form onSubmit={this.handleSubmit} method="POST">
      <h1>Hello, {this.state.name}! </h1>
      <h4>Enter your personal details and start your furniture adventure with us!</h4>
      <?php
      if (isset($_SESSION['signupError'])) {
        echo '<h6>Error: Invalid credentials were entered!</h6>';
      }
      ?>
        <label>
          Name:
          <input 
            type="text" 
            name='name'
            id='name'
            placeholder='Enter Name'

            onChange={this.handleChange}/>
        </label>
        <h6>{this.state.errorMsgName}</h6>

        <label>
          Phone Number:
          <input 
            type="text" 
            name='phoneNumber'
            id='phoneNumber'
            placeholder='Enter Phone Number'

            onChange={this.handleChange}/>
        </label>
        <h6>{this.state.errorMsgPhone}</h6>

        <label>
          Email Address:
          <input 
            type="text" 
            name='emailID'
            id='emailID'
            placeholder='Enter Email'

            onChange={this.handleChange}/>
        </label>
        <h6>{this.state.errorMsgEmail}</h6>

        <label>
        Password:
        <input 
            type="text" 
            name='password'
            id='password'
            placeholder='Enter Password'

            onChange={this.handleChange}/>
        </label>
        <br></br>

        <input type="submit" value="Submit" />
      </form>	  
      </div>
      <div class="col-sm-1">
      </div>
  </div>
</div>
    );
  }
}

ReactDOM.render(
  <LoginForm />,
  document.getElementById('root')
);


</script>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>