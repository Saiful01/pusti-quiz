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
             style="background: url('../img/form-bg.png') center; background-repeat: no-repeat; height: 406px"
             id="intro">
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <h5 class="text-danger fw-bold mt-5 text-center">হ্যান্ডস অন কোর্সটি দেখতে নিচের তথ্যগুলো দিয়ে
                        সহায়তা
                        করুন </h5>

                    <div class="row">
                        <div class="col-md-6 col-6 mt-5">
                            <input type="text" class="form-control" name="name" ng-model="name" placeholder="আপনার নাম"
                                   required>
                        </div>
                        <div class="col-md-6 col-6 mt-5">
                            <input type="text" class="form-control" name="phone" ng-model="phone"
                                   placeholder="ফোন নাম্বার "
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

            <h5 class="fw-bold text-center header-text">সার্টিফিকেট ডাউনলোড করতে নিচের প্রশ্নগুলোর সঠিক উত্তর দিন </h5>

            <div class="row" id="quiz-design">

                <div ng-repeat="question in questions">
                    <div class="col-md-6 col-6 mx-auto mt-3" style="text-align: center">
                        <label class="text-center quiz-header">@{{ question.question }}</label><br>

                        <input type="hidden" class="form-control red-text" ng-model="question.selectedAnswer"
                               placeholder="Choose an answer">

                        <div ng-repeat="answer in question.answers">
                            <label
                                ng-click="selectAnswer(question, answer)"
                                ng-class="{
                    'selected-answer': question.selectedAnswer === answer && question.selectedAnswer !== question.correctAnswer,
                    'correct-answer': question.selectedAnswer === question.correctAnswer && question.selectedAnswer === answer,
                    'incorrect-answer': question.selectedAnswer === answer && question.selectedAnswer !== question.correctAnswer,
                }"
                                class="red-text"
                            >
                                @{{ answer }}
                                <span ng-if="question.selectedAnswer === answer">
                    <span ng-if="question.correctAnswer === answer" class="correct-icon answer-icon"></span>
                    <span ng-if="question.selectedAnswer !== question.correctAnswer"
                          class="incorrect-icon answer-icon"></span>
                </span>
                            </label>
                        </div>
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
