@extends("layouts.frontend")
@section('title', $title)
@section('description', $description)
@section('image', $image)
@section("content")

    <div class="container-fluid desktop-background1">
        <div class="row">
            <!-- Content for desktop -->
        </div>
    </div>
    <div class="container-fluid mobile-background1">
        <div class="row">
            <!-- Content for mobile -->
        </div>
    </div>
    <form>
        <div class="container-fluid"
             style="background: url('../img/form-bg.png') center; background-repeat: no-repeat; height: 406px" id="intro">
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <h5 class="text-danger fw-bold mt-5 text-center">হ্যান্ডস অন কোর্সটি দেখতে নিচের তথ্যগুলো দিয়ে সহায়তা
                        করুন </h5>

                    <div class="row">
                        <div class="col-md-6 col-6 mt-5">
                            <input type="text" class="form-control" name="name" ng-model="name" placeholder="আপনার নাম"
                                   required>
                        </div>
                        <div class="col-md-6 col-6 mt-5">
                            <input type="text" class="form-control" name="phone" ng-model="phone" placeholder="ফোন নাম্বার "
                                   required>
                        </div>
                        <div class="col-md-6 col-6 mt-3">
                            <input type="email" class="form-control" name="email" ng-model="email" placeholder="ই-মেইল "
                                   required>
                        </div>
                        <div class="col-md-6 col-6 mt-3">
                            <input type="text" class="form-control" name="gender" ng-model="gender" placeholder="ঠিকানা"
                                   required>
                        </div>
                        <div class="col-md-2 col-4 mx-auto mt-5">
                            <a class="btn btn-danger "> <span class="p-3" ng-click="sendNext()">পরবর্তী</span> </a>
                        </div>

                    </div>

                </div>


            </div>
        </div>
        <div class="container-fluid quiz"
             style="background: url('../img/quiz-bg.png') center; background-repeat: no-repeat; " id="quiz">

            <h5 class="fw-bold text-center header-text">হ্যান্ডস অন কোর্সটি দেখতে নিচের তথ্যগুলো দিয়ে সহায়তা করুন </h5>

            <div class="row" id="quiz-design">

                <div ng-repeat="question in questions">
                    <div class="col-md-6 col-6 mx-auto mt-3" style="text-align: center">
                        <label class="text-center quiz-header">@{{ question.question }}</label><br>

                        <!-- Input field to display the selected answer -->
                        <input type="hidden" class="form-control red-text" ng-model="question.selectedAnswer" placeholder="Choose an answer">

                        <div ng-repeat="answer in question.answers">
                            <label
                                ng-click="selectAnswer(question, answer)"
                                ng-class="{
          'selected-answer': question.selectedAnswer === answer,
          'correct-answer': question.correctAnswer === answer && question.selectedAnswer === answer,
          'incorrect-answer': question.selectedAnswer === answer && question.selectedAnswer !== question.correctAnswer,
        }"
                                class="red-text"
                            >
                                @{{ answer }}
                            </label>
                        </div>

                        <!-- Display a message based on the last selected answer -->
                        {{-- <div class="answer-message">
                             <span ng-if="lastSelectedAnswer === question.correctAnswer && lastSelectedAnswer !== ''">Your answer is correct.</span>
                             <span ng-if="lastSelectedAnswer !== question.correctAnswer && lastSelectedAnswer !== ''">Your answer is incorrect.</span>
                         </div>--}}
                    </div>
                </div>





                <div class="col-md-2 col-4 mx-auto mt-5">
                    <a class="btn btn-default" ng-click="answerSave()">সাবমিট করুন</a>
                </div>


            </div>
        </div>


        </div>
    </form>
    <div class="container-fluid desktop-background2">
        <div class="row">
            <!-- Content for desktop -->
        </div>
    </div>
    <div class="container-fluid mobile-background2">
        <div class="row">
            <!-- Content for mobile -->
        </div>
    </div>

@endsection
