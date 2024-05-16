import 'package:flutter/material.dart';

class SearchableDropdown extends StatefulWidget {
  final List<String> suggestions;
  final Function(String) onSuggestionSelected;
  final String labelText;

  SearchableDropdown({required this.suggestions, required this.onSuggestionSelected, required this.labelText});

  @override
  _SearchableDropdownState createState() => _SearchableDropdownState();
}

class _SearchableDropdownState extends State<SearchableDropdown> {
  TextEditingController _textEditingController = TextEditingController();

  @override
  Widget build(BuildContext context) {
    return Column(
      children: [
        TextField(
          controller: _textEditingController,
          onChanged: (value) {
            // Handle text field changes
          },
          decoration: InputDecoration(
            labelText: widget.labelText,
          ),
        ),
        Expanded(
          child: ListView.builder(
            itemCount: widget.suggestions.length,
            itemBuilder: (context, index) {
              final suggestion = widget.suggestions[index];

              return ListTile(
                title: Text(suggestion),
                onTap: () {
                  widget.onSuggestionSelected(suggestion);
                },
              );
            },
          ),
        ),
      ],
    );
  }
}