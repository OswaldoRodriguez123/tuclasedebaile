 $(document).ready(function() {
    $('.col-md-12 > .po-link1').popover({
       trigger: 'hover',
       html: true,  // must have if HTML is contained in popover

       // get the title and conent
       title: function() {
         return $(this).parent().find('.po-title').html();
       },
       content: function() {
         return $(this).parent().find('.po-body').html();
       },

       container: 'body',
       placement: 'right'

     });
     
     $("#myPopover").popover({
        title : 'Default title value'
    });
    
    $(window).scroll(function() {
        if ($(this).scrollTop() > 100) {
            $('a.scroll-top').fadeIn();
        } else {
            $('a.scroll-top').fadeOut();
        }
    });
    //Crea la animacion al dar clic sobre el boton
    $('a.scroll-top').click(function() {
        $("html, body").animate({scrollTop: 0}, 600);
        return false;
    }); 
    
});



    


