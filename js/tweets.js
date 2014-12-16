$(function() {
  var client = new elasticsearch.Client({
    host: 'elastic-search.grantjbutler.com:9200'
  });
  
  var searchField = $('#search');
  var searchUserField = $('#user');
  var queryFormat = 'text:"* {QUERY} *" OR "{QUERY} *" OR "* {QUERY}"';
  
  $('#submit').click(function() {
    var searchString = searchField.val().trim();
    var userSearchString = searchUserField.length ? searchField.val().trim() : null;
    
    if (searchString.length <= 0) {
      alert('Please enter a valid search string.');
      
      return;
    }
    
    if (userSearchString && userSearchString.length <= 0) {
      alert('Please enter a user to search for.');
      
      return;
    }
    
    
    var query = queryFormat.replace(/{QUERY}/ig, searchString);
    
    if (userSearchString) {
      query = '(' + query + ') AND user.username:"' + userSearchString + '"';
    }
    
    client.search({
      index: 'twitter',
      type: 'tweets',
      q: query
    }, function(error, resposne) {
      console.log(arguments);
    });
  });
});