<?php
session_start();
$_SESSION['loginError'] = NULL;
if (isset($_SESSION['loggedIn'])) {
  header("Location: userDashboard.php");
  exit();
}
// If teh user is logged in then they are redirected to the dashboard page
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="./styles/base.css" />
  <link rel="stylesheet" href="./styles/form.css" />
  <title>Furniture Emporium - Sign Up</title>
  <meta name="description" content="User Signup Page!">
  <meta name="keywords" content="Register, Signup, Create Account">
  <!-- REACT is JavaScript library created by Facebook used for building Web Apps -->
  <script src="https://unpkg.com/react@16/umd/react.production.min.js"></script>
  <script src="https://unpkg.com/react-dom@16/umd/react-dom.production.min.js"></script>
  <script src="https://unpkg.com/babel-standalone@6.15.0/babel.min.js"></script>

</head>

<body>
  <!-- Imports the Navbar -->
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
      errorMsgPassword: '',
      nameVal: false,
      phoneVal: false,
      emailVal: false,
      passVal: false,
    };
  }

  handleChange = (event) => {
      let name = event.target.name;
      let value = event.target.value;
      // When a change is detected in the input each of the text fields are checked against these parameters
      // Once all the validations = true, then the buttons becomes enabled for clicking
      // Name Validation
      if (name == "name") {
        if (value =="") {
            this.setState({errorMsgName: <strong>Your name should not be empty</strong>});
            this.setState({nameVal: false});
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
                this.setState({nameVal: false});
            } else {
                this.setState({errorMsgName: <strong>Your name is valid!</strong>});
                this.setState({nameVal: true});
            }
        }
// Phone Number Validation
      } else if (name === "phoneNumber") {
        if ((value !="" && !Number(value)) || (value.length>=12)){
            this.setState({errorMsgPhone: <strong>Your phone number should only be numerics between 0 to 9 and the it should not exceed 11 digits in total</strong>});
            this.setState({phoneVal: false});
        } else if (value =="") {
            this.setState({errorMsgPhone: <strong>Your phone number should not be empty</strong>});
            this.setState({phoneVal: false});
        } else {
            this.setState({errorMsgPhone: <strong>Your phone number is valid!</strong>});
            this.setState({phoneVal: true});
        }
// Email Validation
    } else if (name == "emailID") {
        const emailRegEx = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        if ((emailRegEx.test(value) == false) && (value != "")) {
            this.setState({errorMsgEmail: <strong>Your email address is invalid!</strong>});
            this.setState({emailVal: false});
        } else if  (value == "") {
            this.setState({errorMsgEmail: <strong>Your email address is empty!</strong>});
            this.setState({emailVal: false});
        } else if (emailRegEx.test(value) == true) {
            this.setState({errorMsgEmail: <strong>Your email address is valid!</strong>});
            this.setState({emailVal: true});
        }
// Email Validation
    } else if (name == "password") {
        if  (value == "") {
                this.setState({errorMsgPassword: <strong>Your password is empty!</strong>});
                this.setState({passVal: false});
        } else {
          this.setState({errorMsgPassword: <strong>Your password is valid!</strong>});
          this.setState({passVal: true});
        }
    }
// Set final state
      this.setState({
      [name]: value,
    });
  };

  handleSubmit = event => {
  const { name, phoneNumber, emailID, password} = this.state;
// Set final state
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
      httpxml.send();
  };

  render() {
    const { nameVal, phoneVal, emailVal, passVal } = this.state;
      const enabled =
      nameVal === true && phoneVal === true && emailVal === true && passVal === true;
      // If all validation == true, then the button can be clicked, else the button is disabled
    return (
      <div class="container text-center">
      <h3>Enter your personal details and start your furniture adventure with us!</h3>
  <div class="row">
  <div class="col-sm-1">
      </div>
  <div class="col-sm-10" align="center">
      <form onSubmit={this.handleSubmit} method="POST">
      <h1>Hello, {this.state.name}! </h1>

      <?php
      if (isset($_SESSION['signupError'])) {
        echo '<h6>Error - Invalid credentials were submitted!</h6>';
      }
      ?>
        <label class="form-control">
          Full Name:
          <input 
            type="text" 
            name='name'
            id='name'
            placeholder='Enter Name'
            class="form-control"

            onChange={this.handleChange}/>
        </label>
        <h6>{this.state.errorMsgName}</h6>

        <label class="form-control">
          Phone Number:
          <input 
            type="text" 
            name='phoneNumber'
            id='phoneNumber'
            placeholder='Enter Phone Number'
            class="form-control"

            onChange={this.handleChange}/>
        </label>
        <h6>{this.state.errorMsgPhone}</h6>

        <label class="form-control">
          Email Address:
          <input 
            type="text" 
            name='emailID'
            id='emailID'
            placeholder='Enter Email'
            class="form-control"

            onChange={this.handleChange}/>
        </label>
        <h6>{this.state.errorMsgEmail}</h6>

        <label class="form-control">
        Password:
        <input 
            type="password" 
            name='password'
            id='password'
            placeholder='Enter Password'
            class="form-control"

            onChange={this.handleChange}/>
        </label>
        <h6>{this.state.errorMsgPassword}</h6>
        <br></br>

        <input type="submit" value="Sign Up!" class="btn btn-primary" disabled = {!enabled}/>
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