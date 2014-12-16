$(function() {
  var client = new elasticsearch.Client({
    host: 'elastic-search.grantjbutler.com:9200'
  });
  
  var searchField = $('#search');
  var searchUserField = $('#user');
  
  $('#submit').click(function() {
    var searchString = searchField.val().trim();
    var userSearchString = searchUserField.length ? searchUserField.val().trim() : null;
    
    if (searchString.length <= 0) {
      alert('Please enter a valid search string.');
      
      return;
    }
    
    if (userSearchString && userSearchString.length <= 0) {
      alert('Please enter a user to search for.');
      
      return;
    }
    
    
    var query = 'text:(+' + searchString + ')';
    
    if (userSearchString) {
      query += ' AND user.screen_name:"' + userSearchString + '"';
    }
    
    client.search({
      index: 'twitter',
      type: 'tweets',
      q: query
    }, function(error, response) {
      if (error) {
        alert(error);
        
        return;
      }
      
      var hasTweets = (response.hit.total > 0);
      if (hasTweets) {
        var tweets = response.hit.hits;
        
        // TODO: Do something with tweets.
      }
      else {
        // TODO: Show that no tweets matched the query.
      }
    });
  });
});