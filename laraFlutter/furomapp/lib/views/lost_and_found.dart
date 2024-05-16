import 'package:flutter/material.dart';
import 'package:furomapp/controllers/lostItem.dart';
import 'package:get/get.dart';

class LostAndFoundPage extends StatefulWidget {
  const LostAndFoundPage({Key? key}) : super(key: key);

  @override
  _LostAndFoundPageState createState() => _LostAndFoundPageState();
}

class _LostAndFoundPageState extends State<LostAndFoundPage> {

    final TextEditingController _cetegorycontroller= TextEditingController();
  final TextEditingController _descriptioncontroller = TextEditingController();
  final LostItemController _lostItemController  =  Get.put(LostItemController()); 

  String _selectedCategory = '';
  String _description = '';

  final List<String> _categories = [
    'Select Category',
    'Electronics',
    'Accessories',
    'Clothing',
    'Documents',
    'Others'
  ];

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Text('Request Lost Item'),
      ),
      body: Padding(
        padding: EdgeInsets.all(16.0),
        child: Column(
          crossAxisAlignment: CrossAxisAlignment.start,
          children: [
            SizedBox(height: 20,),
            Text(
              'Category',
              style: TextStyle(fontSize: 24.0, fontWeight: FontWeight.bold),
            ),
            DropdownButtonFormField<String>(
              value: _selectedCategory.isNotEmpty ? _selectedCategory : null,
              items: _categories.map((category) {
                return DropdownMenuItem<String>(
                  value: category,
                  child: Text(category),
                );
              }).toList(),
              onChanged: (value) {
                setState(() {
                  _selectedCategory = value!;
                });
              },
            ),
            SizedBox(height: 20.0),
            Text(
              'Description',
              style: TextStyle(fontSize: 24.0, fontWeight: FontWeight.bold),
            ),
            SizedBox(height: 10.0),
            Expanded(
              child: TextFormField(
                controller: _descriptioncontroller,
                maxLines: null,
                keyboardType: TextInputType.multiline,
                decoration: InputDecoration(
                  hintText: 'Provide details about the lost or found item...',
                  border: OutlineInputBorder(
                    borderRadius: BorderRadius.circular(10.0),
                    borderSide: BorderSide(color: Colors.grey),
                  ),
                ),
                onChanged: (value) {
                  setState(() {
                    _description = value;
                  });
                },
              ),
            ),
          ],
        ),
      ),
      floatingActionButton: FloatingActionButton(
        onPressed: () async{
                      await _lostItemController.saveLost(
                        category: _selectedCategory, 
                        decsription: _description, 
                        );
                    },
        child: Icon(Icons.send, color: Color(0xFFF36D44),),
      ),
    );
  }
}

