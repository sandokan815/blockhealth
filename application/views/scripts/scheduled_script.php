<!-- FullCalendar CSS -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/fullcalendar.min.css"> 

<!-- FullCalendar JS-->
<script src="<?php echo base_url(); ?>assets/js/moment.min.js" ></script>
<script src="<?php echo base_url(); ?>assets/js/fullcalendar.min.js" ></script>

<style>
    .fc-toolbar.fc-header-toolbar:first-child,
    .fc-toolbar .fc-right {
        display: block;
    }
</style>

<script>
    
    function get_workflow_dash_info() {
        url = base + "workflow_dash/get_workflow_dash_info";
        data = $("#sample_form").serialize();
        $.post({
            url: url,
            data: data
        }).done(function (response) {
            if (IsJsonString(response)) {
                data = JSON.parse(response);
                data.forEach(function (value, index) {
                    template = $("#sample_tab").html();
                    template = template.replace("<drname></drname>", value.dr_name);
                    template = template.replace("<visitcount></visitcount>", value.patients);
                    template = template.replace("_dr_id", value.dr_id);
                    $("#workflow_dash_container").append(template);
                });
                
                //open first physician by default
                setTimeout(function() { 
                    root = $("#workflow_dash_container").find("a.collapse-link:not(.done)");
                    if(root.length == 2) {
                        temp = root[1];
                        temp.click();
                        $(temp).addClass("done");
                    }
                }, 500);
            }
        });
    }
    
    $(document).ready(function () {
        $("#li_scheduled").addClass("active");
        
        get_workflow_dash_info();
        
        $("#workflow_dash_container").on("click", ".collapse-link", function () {            
            var a = $(this).closest(".x_panel"), b = $(this).find("i"), c = a.find(".x_content");
            a.attr("style") ? c.slideToggle(200, function () {
//                a.removeAttr("style");
            }) : (c.slideToggle(200), a.css("height", "auto")), b.toggleClass("fa-chevron-up fa-chevron-down");
    
            if(b.hasClass('fa-chevron-down')) return;
        
            cur_collapse_link = this;
            dr_id = $(this).closest("li").attr("dr_id");
            form = $("#sample_form");
            form.find("#id").val(dr_id);
            url = base + "workflow_dash/get_scheduled_patients";
            data = form.serialize();
            $.post({
                url: url,
                data: data
            }).done(function (response) {
                if (IsJsonString(response)) {
                    data = JSON.parse(response);
                    a = new Date();
                    cur_date = a.getFullYear()+'-'+(a.getMonth()+1)+'-'+a.getDate();
                    div = $(cur_collapse_link).closest(".x_panel").find(".my_calender");
                    $(div).fullCalendar({
                        header: {
                            left: 'prev,next today',
                            center: 'title',
                            right: 'month,agendaWeek,agendaDay,listWeek'
                        },
                        defaultView: 'listWeek',
                        defaultDate: cur_date,
                        navLinks: true, // can click day/week names to navigate views
                        eventLimit: true, // allow "more" link when too many events
                        events: data
                    });

                } else {
                    error("Unexpected Error Occured");
                }
            });
        });
    });
</script> 