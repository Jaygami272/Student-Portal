@extends('layouts.app')
 <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    .container {
      position: relative;
      min-height: 100vh;
      background: white;
    }

    .container .image-container {
      display: flex;
      flex-wrap: wrap;
      gap: 15px;
      /* justify-content: center; */
      padding: 10px;
    }

    .container .image-container .image {
      height: 250px;
      width: 350px;
      border: 10px solid white;
      box-shadow: 0 5px 15px black;
      overflow: hidden;
      cursor: pointer;
    }

    .container .image-container .image img {
      height: 100%;
      width: 100%;
      object-fit: cover;
      transition: 0.2s linear;
    }
    .container .image-container .image:hover img {
      transform: scale(1.1);
    }

    .container .popup-image {
      position: fixed;
      top: 50;
      left: 0;
      background: black;
      height: 100%;
      width: 100%;
      z-index: 100;
      display: none;
    }
    .container .popup-image span {
      position: absolute;
      top: 0;
      right: 10px;
      font-size: 40px;
      font-weight: bolder;
      color: white;
      cursor: pointer;
      z-index: 100;
    }

    .container .popup-image img {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      border: 5px solid white;
      border-radius: 5px;
      width: 650px;
      object-fit: cover;
    }

    @media (max-width: 768px) {
      .container .popup-image img {
        width: 95%;
      }
    }
  </style>
@section('content')
<div class="pagetitle">
    <div class="row">
        <div class="col-sm-6">
            <h1>Lecture Time table</h1>
        </div>
        <div class="col-sm-6">
            <a href="{{route('timetables.create')}}"><button type="button" class="btn btn-gray float-right">Add Timetable</button></a>
            
        </div>
    </div>
</div>

<div class="container">
    <div class="image-container">
       @foreach ($ltimetables as $ltimetable)
       <div>
        <div class="image">
        <img class="img-fluid img-thumbnail "  src=" {{ asset('/storage/'.$ltimetable->file_name) }}">
        
      </div>
        <div style="margin-top: 10px;text-align:center">
        <form method="POST" action="{{ route('timetables.destroy',$ltimetable->id) }}">
            @method('DELETE')
            @csrf
            
            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('are you sure')"><i class="bi bi-trash"></i></button>
            <h5>sem {{$ltimetable->sem}}</h5>
        </form>
        
        </div>
       </div>
       @endforeach
    </div>


<div class="popup-image">
    <span>&times;</span>
    <img src="" alt="" />
  </div>
</div>

<script>
  document.querySelectorAll(".image img").forEach(image => {
        image.onclick = () => {
          document.querySelector(".popup-image").style.display = "block";
          document.querySelector(".popup-image img").src =
            image.getAttribute("src");
        };
      });

      document.querySelector(".popup-image span").onclick = () => {
        document.querySelector(".popup-image").style.display = "none";
      };

</script>
@endsection