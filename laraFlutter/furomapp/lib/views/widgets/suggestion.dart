import 'package:flutter/material.dart';

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
