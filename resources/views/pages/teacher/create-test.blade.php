@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'My Tests'])
      <div class="container-fluid py-4">
        <form method="POST" action="{{route('save-test')}}">
          @csrf
          @method('POST')
          <div class="col-12 mt-4 mx-auto">
            <div class="card">
              <div class="card-header pb-0 px-3">
                <h6 class="mb-0">New Test</h6>
              </div>
              <div class="card-body pt-4 p-3">
                <div class = "mb-5">
                  <label for="title">Title</label>
                  <input type="text" id="title" class="form-control" name="title"/>
                  <label for="description">Description</label>
                  <textarea type="text" id="description" rows="4" class="form-control" name="description"></textarea>
                </div>
                <ul id="questions" class="list-group">
                  <li id="question 1" class="list-group-item pb-4 mb-2" style="background-color: lightgray" >
                    <label for="question text 1">Question 1</label>
                    <input type="text" id="question text 1" class="form-control" name="question text 1"><br>
                    <label for="answerList 1">Answers</label>
                      <ol type="a" id="answerList 1">
                        <li class="list-group-item" style="background-color: #dddddd">
                            <label for="answer 1 1">1. </label>
                            <input type="radio" id="radio 1 1" class="mx-2" name="radio 1" checked>
                            <input type="text" id="answer 1 1" class="" name="answer 1 1">
                            <button class="mx-3" type="button" onclick="addAnswer(this)">+</button>
                        </li>
                      </ol>
                  </li>
                </ul>
              <script>
              function addAnswer(btn) {
                let li = document.createElement("li");
                let answerList = btn.parentElement.parentElement;
                let n_quest = answerList.id.split(" ")[1];
                let n_ans = answerList.childElementCount+1;
                let id_ans = "answer "+n_quest+" "+n_ans;
                let color = (parseInt(n_ans) % 2) === 1 ? "#dddddd" : "#eeeeee";
                li.style.backgroundColor =  color;
                console.log(li.style.backgroundColor);
                li.className = "list-group-item";
                li.innerHTML = ""+
                    "<label for='"+id_ans+"'>"+n_ans+".&nbsp </label>"+
                    "<input type=\"radio\" id=\"radio "+n_quest+" "+n_ans+"\" class=\"mx-2\" name=\"radio "+n_quest+"\">"+
                    "<input type=\"text\" id='"+id_ans+"' class='mx-1' name='"+id_ans+"'>"+
                    "<button class=\"mx-3\" type=\"button\" onclick=\"addAnswer(this)\">+</button>"
                  "";
                answerList.appendChild(li);
                console.log(btn.id);
                btn.parentElement.removeChild(btn);
              }

              function addQuestion() {
                let li = document.createElement("li");
                let questionList = document.getElementById("questions");
                let n_quest = questionList.childElementCount+1;
                let color = (parseInt(n_quest) % 2) === 1 ? "#d3d3d3" : "#dfdfdf";
                let id_quest = "question "+n_quest;
                li.style.backgroundColor = color;
                li.className = "list-group-item pb-4 mb-2";
                li.innerHTML = "" +
                    "<label for=\"question text "+n_quest+"\">Question "+n_quest+"</label>" +
                    "<input type=\"text\" id=\"question text "+n_quest+"\" class=\"form-control\" name=\"question text "+n_quest+"\"><br>"+
                    "<label for=\"answerList "+n_quest+"\">Answers</label>"+
                      "<ol type=\"a\" id=\"answerList "+n_quest+"\">"+
                        "<li class=\"list-group-item\" style=\"background-color: #dddddd\">"+
                            "<label for=\"answer "+n_quest+" 1\">1. </label>"+
                            "<input type=\"radio\" id=\"radio "+n_quest+" 1\" class=\"mx-2\" name=\"radio "+n_quest+"\" checked>"+
                            "<input type=\"text\" id=\"answer "+n_quest+" 1\" class=\"mx-2\" name=\"answer "+n_quest+" 1\">"+
                            "<button class=\"mx-3\" type=\"button\" onclick=\"addAnswer(this)\">+</button>"+
                        "</li>"+
                      "</ol>";
                li.id = id_quest;
                questionList.appendChild(li);
              }
              </script>
          </div>
        </div>
      </div>
      <footer class="footer pt-3">
          <div class="card">
            <div class="card-body pb-0">
              <button type="button" class="btn btn-outline-success px-3 mb-0" onclick="addQuestion()">Add Quetion</button>
              <div class="ms-auto text-end" style="float:right">
                <button class="btn btn-primary" type="submit">Finish</button>
              </div>
            </div>
        </div>
      </footer>
    </form>
    @include('layouts.footers.auth.footer')
  </div>
@endsection