angular.module('mainCtrl',[])
    .controller('mainController', function($scope, $http, Comment) {

        $scope.commentData = {};

        $scope.loading = true;

        Comment.get()
            .success(function(data) {
                $scope.comments = data;
                $scope.loading = false;
            });

        $scope.submitComment = function() {
            $scope.loading = true;

            // save the comment. pass in comment data from the form
            // use the function we created in our service
            Comment.save($scope.commentData)
                .success(function(data) {

                    // if successful, we'll need to refresh the comment list
                    Comment.get()
                        .success(function(getData) {
                            $scope.comments = getData;
                            $scope.loading = false;
                        });

                })
                .error(function(data) {
                    console.log(data);
                });
        };

        $scope.deleteComment = function(id) {
            $scope.loading = true; 

            // use the function we created in our service
            Comment.destroy(id)
            .success(function(data) {

                // if successful, we'll need to refresh the comment list
                Comment.get()
                    .success(function(getData) {
                        $scope.comments = getData;
                        $scope.loading = false;
                    });
            });
        };

    });