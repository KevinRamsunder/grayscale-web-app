var featherEditor = new Aviary.Feather({
     apiKey: 'c7110a61145b479584c562e822f2fffd',
     apiVersion: 3,
     theme: 'dark',
     tools: 'effects',
     initTool: 'effects',
     appendTo: '',

    onSave: function(imageID, newURL) {
         var img = document.getElementById(imageID);
         img.src = newURL;
    },

    onError: function(errorObj) {
         alert(errorObj.message);
    }
});

function launchEditor(id, src) {
   featherEditor.launch({
       image: id,
       url: src
   });
   
   return false;
}