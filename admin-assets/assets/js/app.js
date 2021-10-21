!function(t){"use strict";function s(){for(var e=document.getElementById("topnav-menu-content").getElementsByTagName("a"),t=0,n=e.length;t<n;t++)"nav-item dropdown active"===e[t].parentElement.getAttribute("class")&&(e[t].parentElement.classList.remove("active"),e[t].nextElementSibling.classList.remove("show"))}function n(e){var color= '';if(t("#"+e).prop("checked")==true)color='dark';else color='light';axios.post('/admin/setPanelColor',{"color":color});if(t("#"+e).prop("checked")==true){t("#bootstrap-style").attr("href","/admin-assets/assets/css/bootstrap-dark.min.css");t("#app-style").attr("href","/admin-assets/assets/css/app-dark.min.css");}else{t("#bootstrap-style").attr("href","/admin-assets/assets/css/bootstrap.min.css");t("#app-style").attr("href","/admin-assets/assets/css/app.min.css");}}function e(){document.webkitIsFullScreen||document.mozFullScreen||document.msFullscreenElement||(console.log("pressed"),t("body").removeClass("fullscreen-enable"))}var a;t("#side-menu").metisMenu(),t("#vertical-menu-btn").on("click",function(e){e.preventDefault(),t("body").toggleClass("sidebar-enable"),992<=t(window).width()?t("body").toggleClass("vertical-collpsed"):t("body").removeClass("vertical-collpsed")}),t("#sidebar-menu a").each(function(){var e=window.location.href.split(/[?#]/)[0];this.href==e&&(t(this).addClass("active"),t(this).parent().addClass("mm-active"),t(this).parent().parent().addClass("mm-show"),t(this).parent().parent().prev().addClass("mm-active"),t(this).parent().parent().parent().addClass("mm-active"),t(this).parent().parent().parent().parent().addClass("mm-show"),t(this).parent().parent().parent().parent().parent().addClass("mm-active"))}),t(".navbar-nav a").each(function(){var e=window.location.href.split(/[?#]/)[0];this.href==e&&(t(this).addClass("active"),t(this).parent().addClass("active"),t(this).parent().parent().addClass("active"),t(this).parent().parent().parent().addClass("active"),t(this).parent().parent().parent().parent().addClass("active"),t(this).parent().parent().parent().parent().parent().addClass("active"),t(this).parent().parent().parent().parent().parent().parent().addClass("active"))}),t('[data-toggle="fullscreen"]').on("click",function(e){e.preventDefault(),t("body").toggleClass("fullscreen-enable"),document.fullscreenElement||document.mozFullScreenElement||document.webkitFullscreenElement?document.cancelFullScreen?document.cancelFullScreen():document.mozCancelFullScreen?document.mozCancelFullScreen():document.webkitCancelFullScreen&&document.webkitCancelFullScreen():document.documentElement.requestFullscreen?document.documentElement.requestFullscreen():document.documentElement.mozRequestFullScreen?document.documentElement.mozRequestFullScreen():document.documentElement.webkitRequestFullscreen&&document.documentElement.webkitRequestFullscreen(Element.ALLOW_KEYBOARD_INPUT)}),document.addEventListener("fullscreenchange",e),document.addEventListener("webkitfullscreenchange",e),document.addEventListener("mozfullscreenchange",e),t(".right-bar-toggle").on("click",function(e){t("body").toggleClass("right-bar-enabled")}),t(document).on("click","body",function(e){0<t(e.target).closest(".right-bar-toggle, .right-bar").length||t("body").removeClass("right-bar-enabled")}),function(){if(document.getElementById("topnav-menu-content")){for(var e=document.getElementById("topnav-menu-content").getElementsByTagName("a"),t=0,n=e.length;t<n;t++)e[t].onclick=function(e){"#"===e.target.getAttribute("href")&&(e.target.parentElement.classList.toggle("active"),e.target.nextElementSibling.classList.toggle("show"))};window.addEventListener("resize",s)}}(),[].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]')).map(function(e){return new bootstrap.Tooltip(e)}),[].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]')).map(function(e){return new bootstrap.Popover(e)}),window.sessionStorage&&((a=sessionStorage.getItem("is_visited"))?(t(".right-bar input:checkbox").prop("checked",!1),t("#"+a).prop("checked",!0),n(a)):sessionStorage.getItem("is_visited")),t("#light-mode-switch, #dark-mode-switch, #rtl-mode-switch").on("change",function(e){n(e.target.id)}),t(window).on("load",function(){t("#status").fadeOut(),t("#preloader").delay(350).fadeOut("slow")}),Waves.init();$(".reset-file-content").click((e)=>{e.preventDefault();$("#inputGroupFile03").val(null);});}(jQuery);$(document).ready(function(){$(".cnt_dcinput").change(function(){

        $(".cnt_dcinput").parent().removeClass("border-primary");
        $(this).parent().addClass("border-primary");

});

$(".show_ticket_modalbtn").click(function(){
    $(".list_support_ticketfromaxios").html("<div class='row py-5 align-items-center'><div class='col-lg-12 text-center'><div class='spinner-grow text-primary m-1' role='status'> <span class='sr-only'>Loading...</span> </div></div></div>");
    axios.post('/admin/support_ticket/getModalContent',{"id":$(this).data("id")}).then(function(v){
        $(".list_support_ticketfromaxios").html(v.data);
    });
});

$(".panel_loginform").submit(function(e){
    e.preventDefault();
    axios.post('/login',$(this).serialize()).then( (v)=>{
        $(".panel_loginform .alert-danger").remove();
        $(".panel_loginform .alert-success").removeClass('d-none');
        setTimeout(()=>window.location.reload(),2500);
    }).catch(()=>{$(".panel_loginform .alert-danger").removeClass('d-none');});
});
$(".custom-file-input-dashed").click(function(e){
    e.preventDefault();
    $("input[name="+$(this).data('name')+"]").click();
});
$(".developersprtformsubmitbtn").click(()=>$(".createdevelopersupport-form").submit());

$(".content_file_reset-btn,.content_photo_reset-btn").click(function(){
  if($(this).hasClass('content_file_reset-btn')){
      $("input[name=content_file]").val('');
    var a =  $(this).parent().parent().prepend('<div class="col-lg-10"><div class="alert alert-success"> Dosya başarıyla sıfırlandı </div></div>');
    $(".content_fileinput_valuetext").text("Dosya seçilmedi");
      setTimeout(()=>{a.children().eq(0).slideUp();},1400);
    setTimeout(()=>{a.children().eq(0).remove();},1800);
  }else{
      $("input[name=content_photo]").val('');
      var a =  $(this).parent().parent().prepend('<div class="col-lg-10"><div class="alert alert-success"> Fotoğraf başarıyla sıfırlandı </div></div>');
      $(".content_photoinput_valuetext").text("Dosya seçilmedi");
      setTimeout(()=>{a.children().eq(0).slideUp();},1400);
      setTimeout(()=>{a.children().eq(0).remove();},1800);
  }
});
var removing_link = "";

$(document).on("change","input[name=content_photo]",(function(){$(".content_photoinput_valuetext").text($(this).val().split(/(\\|\/)/g).pop());}));
$("input[name=content_file]").change(function(){$(".content_fileinput_valuetext").text($(this).val().split(/(\\|\/)/g).pop());});
$(".remove_linkbtn").click(function (){removing_link = $(this).data('id');});
$(".remove_blinkbtn").click(function (){removing_link = $(this).data('id');});
$(".removelink_confirm-btn").click(function(){
    axios.post('/admin/top_menu/remove',{'id':removing_link}).then((v)=>{
        $(".close_removelinkmodal-btn").click();
        $(".alerts_block").prepend('<div class="col-lg-12 pl-3 pr-3"><div class=" alert alert-success">Link başarıyla kaldırıldı</div></div>');
        setTimeout(()=>{$(".alerts_block").children().slideUp();},1400);

        setTimeout(()=>{window.location.reload();},1500);
    }).catch(()=>{
        $(".close_removelinkmodal-btn").click();
        $(".alerts_block").prepend('<div class="col-lg-12 pl-3 pr-3"><div class=" alert alert-danger">Bir hata oluştu</div></div>');
        setTimeout(()=>{$(".alerts_block").children().slideUp();},1600);

    });
});
$(".removeblink_confirm-btn").click(function(){
        axios.post('/admin/bottom_menu/remove',{'id':removing_link}).then((v)=>{
            $(".close_removelinkmodal-btn").click();
            $(".alerts_block").prepend('<div class="col-lg-12 pl-3 pr-3"><div class=" alert alert-success">Link başarıyla kaldırıldı</div></div>');
            setTimeout(()=>{$(".alerts_block").children().slideUp();},1900);
            setTimeout(()=>{$(".alerts_block").children().remove();},2200);
            setTimeout(()=>{window.location.reload();},2400);
        }).catch(()=>{
            $(".close_removelinkmodal-btn").click();
            $(".alerts_block").prepend('<div class="col-lg-12 pl-3 pr-3"><div class=" alert alert-danger">Bir hata oluştu</div></div>');
            setTimeout(()=>{$(".alerts_block").children().slideUp();},1900);
            setTimeout(()=>{$(".alerts_block").children().remove();},2200);
        });
    });
$(".update_topmenuitem-form").submit(function(e){
    e.preventDefault();
    axios.post('/admin/top_menu/update',$(this).serialize()).then(()=>{
        $(".alerts_block").prepend('<div class="col-lg-12 pl-3 pr-3"><div class=" alert alert-success">Güncelleme işlemi başarılı</div></div>');
        setTimeout(()=>{$(".alerts_block").children().slideUp();},1900);
        setTimeout(()=>{$(".alerts_block").children().remove();},2200);
        setTimeout(()=>{window.location.reload();},2400);
    }).catch(()=>{
        $(".alerts_block").prepend('<div class="col-lg-12 pl-3 pr-3"><div class=" alert alert-danger">Bir hata oluştu</div></div>');
        setTimeout(()=>{$(".alerts_block").children().slideUp();},1900);
        setTimeout(()=>{$(".alerts_block").children().remove();},2000);
    });
});
$(".update_bottommenuitem-form").submit(function(e){
        e.preventDefault();
        axios.post('/admin/bottom_menu/update',$(this).serialize()).then(()=>{
            $(".alerts_block").prepend('<div class="col-lg-12 pl-3 pr-3"><div class=" alert alert-success">Güncelleme işlemi başarılı</div></div>');
            setTimeout(()=>{$(".alerts_block").children().slideUp();},1900);
            setTimeout(()=>{$(".alerts_block").children().remove();},2200);
            setTimeout(()=>{window.location.reload();},2400);
        }).catch(()=>{
            $(".alerts_block").prepend('<div class="col-lg-12 pl-3 pr-3"><div class=" alert alert-danger">Bir hata oluştu</div></div>');
            setTimeout(()=>{$(".alerts_block").children().slideUp();},1900);
            setTimeout(()=>{$(".alerts_block").children().remove();},2000);
        });
    });
$(".new_toplinkform").submit(function(e){
    e.preventDefault();
    axios.post('/admin/top_menu/create',$(this).serialize()).then((v)=>{
        window.location.reload();
    }).catch(()=>{
       var a =  $(".new_toplinkform").children().eq(0).append("<div class='row'><div class='col-lg-12'><div class='alert alert-danger'>Hata oluştu, lütfen eksik veri göndermeyin</div></div></div>");
       setTimeout(()=>{a.children().eq(a.children().length-1).remove();},2200);
    });
});
$(".new_bottomlinkform").submit(function(e){
        e.preventDefault();
        axios.post('/admin/bottom_menu/create',$(this).serialize()).then((v)=>{
            window.location.reload();
        }).catch(()=>{
            var a =  $(".new_toplinkform").children().eq(0).append("<div class='row'><div class='col-lg-12'><div class='alert alert-danger'>Hata oluştu, lütfen eksik veri göndermeyin</div></div></div>");
            setTimeout(()=>{a.children().eq(a.children().length-1).remove();},2200);
        });
    });
var apnlink="";
$(".new_topmchild-btn").click(function(){apnlink=$(this).data('id');});
$(".new_topmenuchild-form").submit(function(e){
    e.preventDefault();
    var data= new FormData(this);
    data.append('parent_id',apnlink);
    axios.post('/admin/top_menu/create',data).then(()=>{
        window.location.reload();
    }).catch(()=>{
        var a =  $(".new_topmenuchild-form").children().eq(0).append("<div class='row'><div class='col-lg-12'><div class='alert alert-danger'>Hata oluştu, lütfen eksik veri göndermeyin</div></div></div>");
        setTimeout(()=>{a.children().eq(a.children().length-1).remove();},2200);
    });
});
$(".createdevelopersupport-form").submit(function(e){
    e.preventDefault();
    axios.post('/admin/sendDeveloperMail',$(this).serialize()).then(function(v){
        if(v.data.status=='success'){
            $(".sprtdev-mbx .alert-success").removeClass('d-none');
        }else{
            $(".sprtdev-mbx .alert-danger").removeClass('d-none');
        }
    });

});
});
