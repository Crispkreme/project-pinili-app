(function(e){function i(){}i.prototype.init=function(){e(".select2").select2(),e(".select2-limiting").select2({maximumSelectionLength:2}),e(".select2-search-disable").select2({minimumResultsForSearch:1/0}),e(".select2-ajax").select2({ajax:{url:"https://api.github.com/search/repositories",dataType:"json",delay:250,data:function(t){return{q:t.term,page:t.page}},processResults:function(t,s){return s.page=s.page||1,{results:t.items,pagination:{more:30*s.page<t.total_count}}},cache:!0},placeholder:"Search for a repository",minimumInputLength:1,templateResult:function(t){if(t.loading)return t.text;var s=e("<div class='select2-result-repository clearfix'><div class='select2-result-repository__avatar'><img src='"+t.owner.avatar_url+"' /></div><div class='select2-result-repository__meta'><div class='select2-result-repository__title'></div><div class='select2-result-repository__description'></div><div class='select2-result-repository__statistics'><div class='select2-result-repository__forks'><i class='fa fa-flash'></i> </div><div class='select2-result-repository__stargazers'><i class='fa fa-star'></i> </div><div class='select2-result-repository__watchers'><i class='fa fa-eye'></i> </div></div></div></div>");return s.find(".select2-result-repository__title").text(t.full_name),s.find(".select2-result-repository__description").text(t.description),s.find(".select2-result-repository__forks").append(t.forks_count+" Forks"),s.find(".select2-result-repository__stargazers").append(t.stargazers_count+" Stars"),s.find(".select2-result-repository__watchers").append(t.watchers_count+" Watchers"),s},templateSelection:function(t){return t.full_name||t.text}}),e(".select2-templating").select2({templateResult:function(t){return t.id?e('<span><img src="/assets/images/flags/select2/'+t.element.value.toLowerCase()+'.png" class="img-flag" /> '+t.text+"</span>"):t.text}}),e("#colorpicker-default").spectrum(),e("#colorpicker-showalpha").spectrum({showAlpha:!0}),e("#colorpicker-showpaletteonly").spectrum({showPaletteOnly:!0,showPalette:!0,color:"#34c38f",palette:[["#0f9cf3","white","#34c38f","rgb(255, 128, 0);","#50a5f1"],["red","yellow","green","blue","violet"]]}),e("#colorpicker-togglepaletteonly").spectrum({showPaletteOnly:!0,togglePaletteOnly:!0,togglePaletteMoreText:"more",togglePaletteLessText:"less",color:"#0f9cf3",palette:[["#000","#444","#666","#999","#ccc","#eee","#f3f3f3","#fff"],["#f00","#f90","#ff0","#0f0","#0ff","#00f","#90f","#f0f"],["#f4cccc","#fce5cd","#fff2cc","#d9ead3","#d0e0e3","#cfe2f3","#d9d2e9","#ead1dc"],["#ea9999","#f9cb9c","#ffe599","#b6d7a8","#a2c4c9","#9fc5e8","#b4a7d6","#d5a6bd"],["#e06666","#f6b26b","#ffd966","#93c47d","#76a5af","#6fa8dc","#8e7cc3","#c27ba0"],["#c00","#e69138","#f1c232","#6aa84f","#45818e","#3d85c6","#674ea7","#a64d79"],["#900","#b45f06","#bf9000","#38761d","#134f5c","#0b5394","#351c75","#741b47"],["#600","#783f04","#7f6000","#274e13","#0c343d","#073763","#20124d","#4c1130"]]}),e("#colorpicker-showintial").spectrum({showInitial:!0}),e("#colorpicker-showinput-intial").spectrum({showInitial:!0,showInput:!0}),e(".vertical-spin").TouchSpin({verticalbuttons:!0,verticalupclass:"ion-plus-round",verticaldownclass:"ion-minus-round",buttondown_class:"btn btn-primary",buttonup_class:"btn btn-primary"}),e("input[name='demo1']").TouchSpin({min:0,max:100,step:.1,decimals:2,boostat:5,maxboostedstep:10,postfix:"%",buttondown_class:"btn btn-primary",buttonup_class:"btn btn-primary"}),e("input[name='demo2']").TouchSpin({min:-1e9,max:1e9,stepinterval:50,maxboostedstep:1e7,prefix:"$",buttondown_class:"btn btn-primary",buttonup_class:"btn btn-primary"}),e("input[name='demo3']").TouchSpin({initval:40,buttondown_class:"btn btn-primary",buttonup_class:"btn btn-primary"}),e("input[name='demo3_21']").TouchSpin({initval:40,buttondown_class:"btn btn-primary",buttonup_class:"btn btn-primary"}),e("input[name='demo3_22']").TouchSpin({initval:40,buttondown_class:"btn btn-primary",buttonup_class:"btn btn-primary"}),e("input[name='demo5']").TouchSpin({initval:40,prefix:"pre",postfix:"post",buttondown_class:"btn btn-primary",buttonup_class:"btn btn-primary"}),e("input[name='demo0']").TouchSpin({initval:40,buttondown_class:"btn btn-primary",buttonup_class:"btn btn-primary"}),e("input[name='demo_vertical']").TouchSpin({initval:40,verticalbuttons:!0}),e("input#defaultconfig").maxlength({warningClass:"badge bg-info",limitReachedClass:"badge bg-warning"}),e("input#thresholdconfig").maxlength({threshold:20,warningClass:"badge bg-info",limitReachedClass:"badge bg-warning"}),e("input#moreoptions").maxlength({alwaysShow:!0,warningClass:"badge bg-success",limitReachedClass:"badge bg-danger"}),e("input#alloptions").maxlength({alwaysShow:!0,warningClass:"badge bg-success",limitReachedClass:"badge bg-danger",separator:" out of ",preText:"You typed ",postText:" chars available.",validate:!0}),e("textarea#textarea").maxlength({alwaysShow:!0,warningClass:"badge bg-info",limitReachedClass:"badge bg-warning"}),e("input#placement").maxlength({alwaysShow:!0,placement:"top-left",warningClass:"badge bg-info",limitReachedClass:"badge bg-warning"})},e.AdvancedForm=new i,e.AdvancedForm.Constructor=i})(window.jQuery),function(){window.jQuery.AdvancedForm.init()}(),$(function(){var e=$(".docs-date"),i=$(".docs-datepicker-container"),t=$(".docs-datepicker-trigger"),s={show:function(a){console.log(a.type,a.namespace)},hide:function(a){console.log(a.type,a.namespace)},pick:function(a){console.log(a.type,a.namespace,a.view)}};e.on({"show.datepicker":function(a){console.log(a.type,a.namespace)},"hide.datepicker":function(a){console.log(a.type,a.namespace)},"pick.datepicker":function(a){console.log(a.type,a.namespace,a.view)}}).datepicker(s),$(".docs-options, .docs-toggles").on("change",function(a){var r,n=a.target,o=$(n),l=o.attr("name"),c=n.type==="checkbox"?n.checked:o.val();switch(l){case"container":c?(c=i).show():i.hide();break;case"trigger":c?(c=t).prop("disabled",!1):t.prop("disabled",!0);break;case"inline":(r=$('input[name="container"]')).prop("checked")||r.click();break;case"language":$('input[name="format"]').val($.fn.datepicker.languages[c].format)}s[l]=c,e.datepicker("reset").datepicker("destroy").datepicker(s)}),$(".docs-actions").on("click","button",function(a){var r,n=$(this).data(),o=n.arguments||[];a.stopPropagation(),n.method&&(n.source?e.datepicker(n.method,$(n.source).val()):(r=e.datepicker(n.method,o[0],o[1],o[2]))&&n.target&&$(n.target).val(r))})});