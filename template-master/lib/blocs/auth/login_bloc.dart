import 'dart:convert';

import 'package:dio/dio.dart';
import 'package:flutter/foundation.dart';
import 'package:flutter/material.dart';
import 'package:template/blocs/global_bloc.dart';
import 'package:template/models/ResponseData.dart';
import 'package:template/utils/api.dart';
import 'package:template/models/User.dart';
import 'package:template/utils/bloc_provider.dart';
import 'package:template/utils/global_function.dart';
import 'package:template/utils/session.dart';
import 'package:rxdart/rxdart.dart';
import 'package:toast/toast.dart';

class LoginBloc extends Object implements BlocBase {
  @override
  void dispose() {
    _codeController.close();
  }

  final _codeController = BehaviorSubject<String>();
  Function(String) get saveCode => _codeController.sink.add;

  doLogin(GlobalKey<FormState> key) async{
    FocusScope.of(key.currentContext).requestFocus(new FocusNode());
    try {
      GlobalBloc.setLoadingController(true);
      if(key.currentState.validate()){
        key.currentState.save();
        var dio = ApiProvider.init();
        User user = User(
          userCode: _codeController.value,
          firebaseToken: await Session.getFirebaseToken()
          // userEmail: _emailController.value,
        );
        Response response = await dio.post("/UserService/login",data: user.toJson());
        ResponseData responseData = ResponseData.fromJson(response.data);
        print(responseData.toJson());
        if(responseData.responseCode == "200"){
          User user = User.fromJson(responseData.data);
          // Storage.saveUser(user);
          // Storage.saveUser(User.fromJson(responseData.data));
          Session.setIsLogin(true);
          Session.setUserId(user.userId);
          Session.setRoleId(user.roleId);
          Session.setCompanyId(user.companyId);
          GlobalBloc.setRoleController(user.roleId);
          // Start Generate Notification
          await Session.setHasScheduled(false);
          // GlobalBloc.generateNotification();
          // END Generate Notification
          
          Navigator.of(key.currentContext).pushNamedAndRemoveUntil('/home', (Route<dynamic> route) => false);
        }
        Toast.show(responseData.responseDesc, key.currentContext,duration: Toast.LENGTH_LONG);
      }
    } on DioError catch (e) {
      print(e);
    }finally{
      GlobalBloc.setLoadingController(false);
    }
  }

  doLogout(BuildContext ctx){
    GlobalFunction.showConfirmDialog(ctx, ()async{
      Session.setIsLogin(false);
      Toast.show("Logout Success", ctx,duration: Toast.LENGTH_LONG);
      Future.delayed(Duration(milliseconds: 500),() => Navigator.of(ctx).pushNamedAndRemoveUntil('/login', (Route<dynamic> route) => false));
    },content: "Logout ?");
  }
}