<!DOCTYPE html>
<html>
  <head>
    <title>Services</title>
    <style>
      .container {
  width: 50%;
  margin: 0 auto;
  text-align: center;
  background-image: url();
  opacity: 0.7; /* adjust the opacity value as desired */
  background-size: cover; /* set the background size to cover the entire container */
  background-repeat: no-repeat; /* don't repeat the background image */
}

body {
  background-image: url('C:\Users\ACER\Downloads');
  background-size: cover;
  background-repeat: no-repeat;
}

      input[type="text"],
      input[type="email"],
      textarea,
      select {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        box-sizing: border-box;
        border: 3px solid maroon;
        border-radius: 6px;
        font-size: 18px;
      }

      input[type="submit"],
      .btn {
        width: 100%;
        background-color: #4CAF50;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
      }

      .upload-btn-wrapper {
        position: relative;
        overflow: hidden;
        display: inline-block;
      }

      .upload-btn-wrapper input[type="file"] {
        font-size: 100px;
        position: absolute;
        left: 0;
        top: 0;
        opacity: 0;
      }

      .edit-btn,
      .delete-btn {
        background-color: #f44336;
        color: white;
        padding: 5px 10px;
        border-radius: 4px;
        cursor: pointer;
        float: right;
        margin-left: 10px;
      }
      
    </style>
  </head>
  <body>
    <div class="container">
      <h2>Service Form</h2>

      <form action="{{ route('image.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        <label for="name">Name:</label><br>
        <input type="text" id="name" name="title" required><br>

        <label for="email">Email:</label><br>
        <input type="email" id="email" name="meg" required><br>

      
        <label for="service">I would like to Discuss:</label><br>

        <select id="dropdown" name="tid" >

                                    @foreach($images as $i)
                                    <option value="{{$i->id}}">{{$i->disc}}</option>
                                    @endforeach
         <!--  <option value="Option 1">Option 1</option>
          <option value="Option 2">Option 2</option>
          <option value="Option 3">Option 3</option>
        < --></select><br><br>

        <div class="upload-btn-wrapper">
          <button class="btn">Upload File</button>
          <input type="file" name="img" />
        </div>

        <br><br>
        <input type="submit" value="Submit">
      </form>

      <h2>Service List</h2>
      <table>
        <tr>
          <th>Fraud & Security</th>
          <th>Advanced Networking</th>
          <th>Performance Analysis</th>
          <th>Artificial Intelligence</th>
        </tr>
      </table >
</body>
<html>