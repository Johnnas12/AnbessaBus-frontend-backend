import 'package:flutter/material.dart';
import 'package:furomapp/controllers/localeProvider.dart';
import 'package:furomapp/l10n/l10n.dart';
import 'package:furomapp/views/splash_screen.dart';
import 'package:get/get.dart';
import 'package:get_storage/get_storage.dart';
import 'package:provider/provider.dart';
import 'views/login_page.dart';
import 'package:flutter_localizations/flutter_localizations.dart';
import 'package:flutter_gen/gen_l10n/app_localizations.dart';

void main() async {
  await GetStorage.init();
  runApp(const MyApp());
}

class MyApp extends StatefulWidget {
  const MyApp({Key? key}) : super(key: key);
  @override
  _MyAppState createState() => _MyAppState();
}

class _MyAppState extends State<MyApp> {
  Locale _locale = const Locale('en');

  @override
  void initState() {
    super.initState();
    Future.delayed(const Duration(seconds: 5), () {
      // Navigate to the login screen after the delay
      Get.to(LoginPage());
    });
  }

   void setLocale(Locale locale) {
    // Your code to set the app's locale...
     setState(() {
      _locale = locale;
    });
  }

  @override
  Widget build(BuildContext context) {
    return ChangeNotifierProvider(
      create: (context)=>LocaleProvider(),
      builder: (context, state) {
      final provider=Provider.of<LocaleProvider>(context);
    return GetMaterialApp(
      title: 'Anbessa Bus',
      debugShowCheckedModeBanner: false,
      supportedLocales: L10n.all,
      locale: provider.locale,
      localizationsDelegates: const [
        AppLocalizations.delegate,
        GlobalMaterialLocalizations.delegate,
        GlobalWidgetsLocalizations.delegate,
        GlobalCupertinoLocalizations.delegate,
      ],
      home: SplashScreen(),
    );
      }
    );
  }
}

