app.controller('quizController', function ($scope, $http, $location) {
    document.getElementById("quiz").style.display = "none";

    $scope.selectedAnswers = [];

    $scope.lastSelectedAnswer = ""; // Add this variable to store the last selected answer

    $scope.selectAnswer = function (question, answer) {
        question.selectedAnswer = answer;
        $scope.lastSelectedAnswer = answer; // Update the last selected answer
    };


    $scope.answerSave = function () {
        var incorrectAnswers = [];
        var unansweredQuestions = [];

        $scope.questions.forEach(function (question, index) {
            if (!question.selectedAnswer) {
                // Add the question number to the list of unanswered questions
                unansweredQuestions.push(index + 1);
            } else if (question.selectedAnswer !== question.correctAnswer) {
                // Add an error message for incorrect answers
                var errorMessage = "প্রশ্ন " + (index + 1) + ": আপনার উত্তর ভুল.\n";
                errorMessage += "   আপনার উত্তর: " + question.selectedAnswer + "\n";
               /* errorMessage += "   Correct answer: " + question.correctAnswer + "\n";*/
                incorrectAnswers.push(errorMessage);
            }
        });

        var errorMessage = "";

        if (unansweredQuestions.length > 0) {
            // Display an error message for unanswered questions
            errorMessage += "আপনি নিম্নলিখিত প্রশ্নের উত্তর দেননি: " + unansweredQuestions.join(", ") + "\n";
        }

        if (incorrectAnswers.length > 0) {
            // Display an error message for incorrect answers
            errorMessage += "নিম্নলিখিত প্রশ্নগুলিতে আপনার ভুল উত্তর আছে:\n";
            incorrectAnswers.forEach(function (error) {
                errorMessage += error + "\n";
            });
        }

        if (errorMessage) {
            messageError(errorMessage);
            return
        } else {
            messageSuccess("সব উত্তর সঠিক!");

        }

        console.log($scope.questions[0].correctAnswer)
        let url = "/quiz-save";
        let params = {
            'name': $scope.name,
            'phone': $scope.phone,
            'email': $scope.email,
            'gender': $scope.gender,
            'ans_1': $scope.questions[0].correctAnswer,
            'ans_2': $scope.questions[1].correctAnswer,
            'ans_3': $scope.questions[2].correctAnswer,
            'ans_4': $scope.questions[3].correctAnswer,
            'ans_5': $scope.questions[4].correctAnswer,

        };
        $http.post(url, params).then(function success(response) {

            if (response.data.code == 200) {

                // Reset all scope values to null
                $scope.name = null;
                $scope.phone = null;
                $scope.email = null;
                $scope.gender = null;


                $scope.questions.forEach(function (question) {
                    question.selectedAnswer = null;
                });
                document.getElementById("quiz").style.display = "none";


                messageSuccess(response.data.message)
                window.location.href = "/certificate";

            }
            if (response.data.code == 400) {

                messageError(response.data.message)
            }
            console.log(response.data);

        });

    };







    $scope.sendNext = function () {


  if (!$scope.name) {
            messageError('আপনার নাম লিখুন ')
            return;
        }
  if ($scope.phone == null || $scope.phone.toString().length < 10) {
            messageError('আপনার ফোন নাম্বার লিখুন ')
            return;
        }
      if (!$scope.email) {
          messageError('আপনার ই-মেইল  লিখুন ')
          return;
      }
      if (!$scope.gender) {
          messageError('আপনার জেন্ডার লিখুন')
          return;
      }
      document.getElementById("quiz").style.display = "block";
        document.getElementById("intro").style.display = "none";
      messageSuccess('নিম্নলিখিত প্রশ্নগুলির উত্তর সিলেক্ট করুন ')





 }

    $scope.questions = [
        {
            question: "কোনটি সাধারণত রান্নায় বেকিং বোঝায়?",
            answers: [
                "খাবারকে চুলায় শুকনো তাপ দিয়ে ঘিরে রান্না করা",
                "তরল পদার্থে খাবার রান্না করা",
                "খাবারকে খোলা আগুনের সরাসরি সংস্পর্শে রান্না করা",
                "একটি স্টিমারে খাবার রান্না করা"
            ],
            selectedAnswer: "",
            correctAnswer: "খাবারকে চুলায় শুকনো তাপ দিয়ে ঘিরে রান্না করা"
        },
        {
            question: "প্যানে রান্নার সময় খাবার উল্টানো এবং ঘুরানোর জন্য কোনটি সাধারণত ব্যবহার করা হয়?",
            answers: [
                "উইস্ক",
                "লেডল",
                "টংস",
                "রোলিং পিন",
            ],
            selectedAnswer: "",
            correctAnswer: "টংস"
        },
        {
            question: "গ্রিল বা রোস্ট করার আগে মাংস ম্যারিনেট \n" +
                "করার উদ্দেশ্য কি?",
            answers: [
                "মাংসকে নরম করা  ও স্বাদ যোগ করা ",
                "এর ক্যালরি সামগ্রী বাড়ােনা",
                "এটা ক্রিস্পি করা",
                "এটিকে সমানভাবে রান্না করা থেকে বিরত রাখা",
            ],
            selectedAnswer: "",
            correctAnswer: "মাংসকে নরম করা  ও স্বাদ যোগ করা "
        },
        {
            question: "একটি ক্লাসিক ভিনেগ্রেট  সালাড  ড্রেসিং তৈরিতে  \n" +
                "কোন উপাদানটি অপরিহার্য?",
            answers: [
                "মেয়োনিজ",
                "কেচাপ ",
                "অলিভ অয়েল এবং ভিনেগার",
                "সয়া সস ",
            ],
            selectedAnswer: "",
            correctAnswer: "অলিভ অয়েল এবং ভিনেগার"
        },
        {
            question: "রান্নায় লবণের প্রাথমিক কাজ কী",
            answers: [
                "খাবারের মিষ্টতা যোগ করা ",
                "স্বাদ মশলা এবং বৃদ্ধি করা",
                "সস এবং স্যুপ ঘন করা",
                "খাবারের রঙ উন্নত করা",
            ],
            selectedAnswer: "",
            correctAnswer: "স্বাদ মশলা এবং বৃদ্ধি করা"
        },

    ];



    function messageError(message) {

        Swal.fire({
            position: 'center',
            icon: 'error',
            title: message,
            showConfirmButton: true,
            timer: 3000,
            customClass: "Custom_Cancel",

        })

    }

    function messageSuccess(message) {

        Swal.fire({
            position: 'center',
            icon: 'success',
            title: message,
            showConfirmButton: true,
            timer: 3000,

        })

    }


});
