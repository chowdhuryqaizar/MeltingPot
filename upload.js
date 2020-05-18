(function() {

  var materialForm;



  materialForm = function() {

    return $('.material-field').focus(function() {

      return $(this).closest('.form-group-material').addClass('focused has-value');

    }).focusout(function() {

      return $(this).closest('.form-group-material').removeClass('focused');

    }).blur(function() {

      if (!this.value) {

        $(this).closest('.form-group-material').removeClass('has-value');

      }

      return $(this).closest('.form-group-material').removeClass('focused');

    });

  };



  $(function() {

    return materialForm();

  });



}).call(this);



//# sourceMappingURL=data:application/json;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiIiwic291cmNlUm9vdCI6IiIsInNvdXJjZXMiOlsiPGFub255bW91cz4iXSwibmFtZXMiOltdLCJtYXBwaW5ncyI6IkFBQUE7QUFBQSxNQUFBOztFQUFBLFlBQUEsR0FBZSxRQUFBLENBQUEsQ0FBQTtXQUNiLENBQUEsQ0FBRSxpQkFBRixDQUFvQixDQUFDLEtBQXJCLENBQTJCLFFBQUEsQ0FBQSxDQUFBO2FBQ3pCLENBQUEsQ0FBRSxJQUFGLENBQU8sQ0FBQyxPQUFSLENBQWdCLHNCQUFoQixDQUF1QyxDQUFDLFFBQXhDLENBQWlELG1CQUFqRDtJQUR5QixDQUEzQixDQUVDLENBQUMsUUFGRixDQUVXLFFBQUEsQ0FBQSxDQUFBO2FBQ1QsQ0FBQSxDQUFFLElBQUYsQ0FBTyxDQUFDLE9BQVIsQ0FBZ0Isc0JBQWhCLENBQXVDLENBQUMsV0FBeEMsQ0FBb0QsU0FBcEQ7SUFEUyxDQUZYLENBSUMsQ0FBQyxJQUpGLENBSU8sUUFBQSxDQUFBLENBQUE7TUFDTCxJQUFHLENBQUMsSUFBQyxDQUFBLEtBQUw7UUFDRSxDQUFBLENBQUUsSUFBRixDQUFPLENBQUMsT0FBUixDQUFnQixzQkFBaEIsQ0FBdUMsQ0FBQyxXQUF4QyxDQUFvRCxXQUFwRCxFQURGOzthQUVBLENBQUEsQ0FBRSxJQUFGLENBQU8sQ0FBQyxPQUFSLENBQWdCLHNCQUFoQixDQUF1QyxDQUFDLFdBQXhDLENBQW9ELFNBQXBEO0lBSEssQ0FKUDtFQURhOztFQVVmLENBQUEsQ0FBRSxRQUFBLENBQUEsQ0FBQTtXQUNBLFlBQUEsQ0FBQTtFQURBLENBQUY7QUFWQSIsInNvdXJjZXNDb250ZW50IjpbIm1hdGVyaWFsRm9ybSA9IC0+XG4gICQoJy5tYXRlcmlhbC1maWVsZCcpLmZvY3VzKC0+XG4gICAgJCh0aGlzKS5jbG9zZXN0KCcuZm9ybS1ncm91cC1tYXRlcmlhbCcpLmFkZENsYXNzICdmb2N1c2VkIGhhcy12YWx1ZSdcbiAgKS5mb2N1c291dCgtPlxuICAgICQodGhpcykuY2xvc2VzdCgnLmZvcm0tZ3JvdXAtbWF0ZXJpYWwnKS5yZW1vdmVDbGFzcyAnZm9jdXNlZCdcbiAgKS5ibHVyIC0+XG4gICAgaWYgIUB2YWx1ZVxuICAgICAgJCh0aGlzKS5jbG9zZXN0KCcuZm9ybS1ncm91cC1tYXRlcmlhbCcpLnJlbW92ZUNsYXNzICdoYXMtdmFsdWUnXG4gICAgJCh0aGlzKS5jbG9zZXN0KCcuZm9ybS1ncm91cC1tYXRlcmlhbCcpLnJlbW92ZUNsYXNzICdmb2N1c2VkJ1xuXG4kIC0+XG4gIG1hdGVyaWFsRm9ybSgpIl19

//# sourceURL=coffeescript