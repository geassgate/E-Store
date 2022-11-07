function myFunction(x) {
    switch(x) {
        case 1:
            var myWindow = window.open("{% url 'vuniversity:live_lecture' %}", "", "width=600,height=600");
          break;
        default:
          // code block
      }
    }