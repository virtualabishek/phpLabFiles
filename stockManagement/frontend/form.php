<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Student Information Form</title>
    <style>
      @import url("https://fonts.googleapis.com/css2?family=Poppins");

      body {
        font-family: "Poppins";
        /* background-color: aqua; */
      }
      h1 {
        text-align: center;
      }
      .mainDiv {
        border-style: double;
        border-width: 2px;
        border-color: black;
        border-radius: 8px;
        padding: 20px;
        margin: 10px;
        box-shadow: 5px 8px 3px purple;
      }
      input {
        padding: 8px 0px;
        margin: 12px 20px;
        box-sizing: border-box;
        border: 2px solid blue;
      }

      input[type="text"],
      input[type="tel"] {
        transition: width 0.4s ease-in-out;
      }

      input[type="text"]:focus,
      input[type="tel"]:focus {
        width: 40%;
      }

      input:focus {
        background-color: aqua;
      }
      input[type="submit"] {
        background-color: green;
        padding: 14px 40px;
        margin: 1px;
        border-radius: 4px;
        color: white;
        cursor: pointer;
      }
      input[type="submit"]:hover {
        background-color: purple;
        color: blanchedalmond;
      }
    </style>
  </head>
  <body>
    <h1>Student Registration Form</h1>
    <div class="mainDiv">
      <form action="/phpLab/day2/backend/form.php" method="post">
        <label for="fname">First Name: </label>
        <input type="text" name="fname" />
        <br />
        <label for="lname">Last Name:</label>
        <input type="text" name="lname" />
        <br />
        <label for="sex">Sex:</label>
        <input type="radio" name="sex" value="male" />Male
        <input type="radio" name="sex" value="female" />Female
        <br />
        <label for="mobile">Mobile:</label>
        <input type="tel" name="mobile" />
        <br />
        <label for="dob">DOB:</label>
        <input type="date" name="dob" />
        <br />
        <label for="address">Adress:</label>
        <input type="text" name="address" />
        <br />
        <label for="remarks">Remarks:</label> <br />
        <textarea cols="50" rows="5" name="" id=""> </textarea>
        <br />
        <input type="submit" />
      </form>
    </div>
  </body>
</html>
~                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               ~                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               ~          