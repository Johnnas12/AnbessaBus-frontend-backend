import 'package:flutter/material.dart';

class Suggest extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      title: 'Reusable Popup Demo',
      theme: ThemeData(
        primarySwatch: Colors.blue,
      ),
      home: SearchPage(),
    );
  }
}

class SearchPage extends StatefulWidget {
  @override
  _SearchPageState createState() => _SearchPageState();
}

class _SearchPageState extends State<SearchPage> {
  TextEditingController _firstController = TextEditingController();
  TextEditingController _secondController = TextEditingController();

  void _openSearchPopup(TextEditingController controller) async {
    final result = await Navigator.push(
      context,
      MaterialPageRoute(
        builder: (context) => FullscreenSearchPopup(
          onSelect: (value) {
            controller.text = value;
          },
        ),
      ),
    );
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Text('Reusable Popup Demo'),
      ),
      body: Column(
        mainAxisAlignment: MainAxisAlignment.center,
        children: <Widget>[
          TextField(
            controller: _firstController,
            readOnly: true,
            onTap: () => _openSearchPopup(_firstController),
            decoration: InputDecoration(
                    hintText: 'Tap to search', 
                    prefixIcon: Icon(Icons.flight, color: Color(0xFFFFE606),),
                    ),
            
          ),
          SizedBox(height: 20),
          TextField(
            controller: _secondController,
            readOnly: true,
            onTap: () => _openSearchPopup(_secondController),
            decoration: InputDecoration(hintText: 'Tap to search'),
          ),
        ],
      ),
    );
  }
}

class FullscreenSearchPopup extends StatefulWidget {
  final Function(String) onSelect;

  FullscreenSearchPopup({required this.onSelect});

  @override
  _FullscreenSearchPopupState createState() => _FullscreenSearchPopupState();
}

class _FullscreenSearchPopupState extends State<FullscreenSearchPopup> {
  List<String> _suggestions = ['Apple', 'Banana', 'Cherry', 'Date', 'Elderberry'];
  String _searchTerm = '';

  void _updateSearchTerm(String newTerm) {
    setState(() {
      _searchTerm = newTerm;
    });
  }

  @override
  Widget build(BuildContext context) {
    List<String> _filteredSuggestions = _suggestions
        .where((suggestion) => suggestion.toLowerCase().contains(_searchTerm.toLowerCase()))
        .toList();

    return Scaffold(
      appBar: AppBar(
        title: Text('Search'),
      ),
      body: Column(
        children: <Widget>[
          Padding(
            padding: const EdgeInsets.all(8.0),
            child: TextField(
              onChanged: _updateSearchTerm,
              decoration: InputDecoration(
                labelText: 'Search',
                border: OutlineInputBorder(),
              ),
            ),
          ),
          Expanded(
            child: ListView.builder(
              itemCount: _filteredSuggestions.length,
              itemBuilder: (context, index) {
                return ListTile(
                  title: Text(_filteredSuggestions[index]),
                  onTap: () {
                    widget.onSelect(_filteredSuggestions[index]);
                    Navigator.pop(context);
                  },
                );
              },
            ),
          ),
        ],
      ),
    );
  }
}
